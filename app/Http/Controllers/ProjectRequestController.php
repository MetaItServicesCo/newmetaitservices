<?php

namespace App\Http\Controllers;

use App\DataTables\ProjectRequestDataTable;
use App\Models\ProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectRequestController extends Controller
{
    /**
     * Display list of project requests with DataTable
     */
    public function list(ProjectRequestDataTable $dataTable)
    {
        return $dataTable->render('pages.project-requests.list');
    }

    /**
     * Show project request details
     */
    public function show($id)
    {
        try {
            $projectRequest = ProjectRequest::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $projectRequest->id,
                    'full_name' => $projectRequest->full_name,
                    'first_name' => $projectRequest->first_name,
                    'last_name' => $projectRequest->last_name,
                    'email' => $projectRequest->email,
                    'phone' => $projectRequest->phone,
                    'company_name' => $projectRequest->company_name,
                    'website_url' => $projectRequest->website_url,
                    'selected_date' => $projectRequest->selected_date->format('d-M-Y'),
                    'weekday' => $projectRequest->weekday,
                    'message' => $projectRequest->message,
                    'created_at' => $projectRequest->created_at->format('d-M-Y'),
                ]
            ]);
        } catch (\Throwable $e) {
            Log::error('Project Request Show Error: ' . $e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Project request not found.'
            ], 404);
        }
    }

    /**
     * Delete project request
     */
    public function destroy($id)
    {
        try {
            $projectRequest = ProjectRequest::findOrFail($id);
            $projectRequest->delete();

            Log::info('Project Request Deleted', [
                'id' => $id,
                'email' => $projectRequest->email,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Project request deleted successfully.'
            ]);
        } catch (\Throwable $e) {
            Log::error('Project Request Delete Error: ' . $e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error deleting project request.'
            ], 500);
        }
    }
}
