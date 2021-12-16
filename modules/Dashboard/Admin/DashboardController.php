<?php
namespace Modules\Dashboard\Admin;

use Illuminate\Http\Request;
use Modules\AdminController;
use Modules\Booking\Models\Booking;
use Modules\Company\Models\Company;
use Illuminate\Support\Facades\Auth;

class DashboardController extends AdminController
{
    public function index()
    {
        if(is_admin())
        {
            $f = strtotime('monday this week');
            $data = [
            ];
            return view('Dashboard::index', $data);
        }else{
            $user = Auth::user();
            $data = [
            ];
            return view('Dashboard::index-company', $data);
        }
    }

    public function reloadChart(Request $request)
    {
        $chart = $request->input('chart');
        switch ($chart) {
            case "earning":
                $from = $request->input('from');
                $to = $request->input('to');
                return $this->sendSuccess([
                    'data' => Booking::getDashboardChartData(strtotime($from), strtotime($to))
                ]);
                break;
        }
    }
}
