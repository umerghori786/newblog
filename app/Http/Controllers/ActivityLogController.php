<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use function route;
use function storage_path;
use function view;


class ActivityLogController extends Controller
{
    public $data = [];
    public $model;

    public function __construct()
    {
        $this->data['module_name'] = "Activity Log";
        //$this->data['module_url'] = route('activityLog.list');

        //$this->data['module'] = $this->getModuleInfo($this->data['module_name']);

        //$this->moduleId = $this->data['module']->id;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $filePath = storage_path('logs/global');
        $files = [];
        if (file_exists($filePath)) {
            $files = array_diff(scandir($filePath), array('.', '..'));
        }

        $this->data['files'] = $files;
        return view('admin.activitylog.index', $this->data);
    }

    public function readFile(Request $request)
    {

        //$fileName = $request->input('file_name');

        //$filePath = storage_path('logs/global/' . $fileName);
        $filePath = storage_path('logs/global/activity_log-2022-11-26.log');
        $fileData = '';
        $data = '';
        if (file_exists($filePath)) {
            $fileData = File::get($filePath);
            $fileData = nl2br($fileData);
            preg_match_all("/ local.INFO: (.*)/i",
                $fileData,
                $out, PREG_PATTERN_ORDER);
            if (!empty($out[1])) {
                foreach($out[1] as $outLog){
                    $test = $outLog;
                    $this->data['activities'][] = unserialize($test);
                }
            }
        }
        $overView = view('admin.activitylog.partials.brief-overview', $this->data)->render();

        return response()->json(['data' => $overView]);
    }
}
