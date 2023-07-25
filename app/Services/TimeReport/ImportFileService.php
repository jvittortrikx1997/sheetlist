<?php

namespace App\Services\TimeReport;

use App\Repositories\Configurations\CategoryRepository;
use App\Repositories\Configurations\CityRepository;
use App\Repositories\Configurations\ProjectRepository;
use App\Repositories\Configurations\SystemRepository;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImportFileService
{
    protected CategoryRepository $categoryRepository;
    protected ProjectRepository $projectRepository;
    protected CityRepository $cityRepository;
    protected SystemRepository $systemRepository;

    public function __construct(
        CategoryRepository $categoryRepository,
        ProjectRepository  $projectRepository,
        CityRepository     $cityRepository,
        SystemRepository   $systemRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->projectRepository = $projectRepository;
        $this->cityRepository = $cityRepository;
        $this->systemRepository = $systemRepository;
    }

    public function importFile(UploadedFile $file, ?int $userId = null)
    {
        $fileContent = $file->getContent();

        $fileContent = explode("\n", $fileContent);
        array_shift($fileContent);

        DB::transaction(function () use ($fileContent, $userId) {
            $data = [];
            foreach ($fileContent as $key => $line) {
                $line = explode(';', $line);
                $lineNumber = $key++;

                $dateReport = Carbon::parse($line[0])->format('Y-m-d');
                $activity = $line[2];
                $category = $this->categoryRepository->getCategoryByName(explode(' ', $line[3])[1]);
                if (!$category) {
                    throw new \Exception("Categoria não encontrada na linha: {$lineNumber}");
                }
                $category = $category->id;

                if ($line[4] == 'Outros') {
                    $project = $this->projectRepository->getProjectByName('Outros');
                    if (!$project) {
                        throw new \Exception("Projeto não encontrada na linha: {$lineNumber}");
                    }
                    $project = $project->id;
                } elseif ($line[4] != '-') {
                    $project = $this->projectRepository->getProjectByName(explode('Projeto ', $line[4])[1]);

                    if (!$project) {
                        throw new \Exception("Projeto não encontrada na linha: {$lineNumber}");
                    }
                    $project = $project->id;
                } else {
                    $project = null;
                }

                if ($line[5] == '-' || empty($line[5]) || $line[5] == 'TODAS') {
                    $city = null;
                } else {
                    $city = $this->cityRepository->getCityByName($line[5]);
                    if (!$city) {
                        throw new \Exception("Cidade não encontrada na linha: {$lineNumber}");
                    }
                    $city = $city->id;
                }

                $ticketNumber = $line[6];
                $requester = $line[7];

                $system = explode(' ', $line[8])[1];

                if ($system == 'Todos') {
                    $system = null;
                } else {
                    $system = $this->systemRepository->getSystemByName($system);
                    if (!$system) {
                        throw new \Exception("Sistema não encontrado na linha: {$lineNumber}");
                    }
                    $system = $system->id;
                }

                $startTime = Carbon::parse($line[9])->format('H:i');
                $endTime = Carbon::parse($line[10])->format('H:i');
                $description = $line[12];
                $observation = $line[13];

                $data[] = [
                    'user_id' => $userId ?? Auth::id(),
                    'report_date' => $dateReport,
                    'activity' => $activity,
                    'category_id' => $category,
                    'project_id' => $project,
                    'city_id' => $city,
                    'ticket_number' => $ticketNumber,
                    'requester' => $requester,
                    'system_id' => $system,
                    'start_time' => $startTime,
                    'end_time' => $endTime,
                    'description' => $description,
                    'observation' => $observation,
                ];
            };

            DB::table('time_reports')->insert($data);
        });

    }

}
