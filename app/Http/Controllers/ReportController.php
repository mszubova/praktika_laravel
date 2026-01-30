<?php

namespace App\Http\Controllers;
use App\Models\Status;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
   
function index(Request $request)
{
    // 1) сортировка
    $sort = $request->input('sort');
    if ($sort !== 'asc' && $sort !== 'desc') {
        $sort = 'desc';
    }

    // 2) фильтр по статусу
    $status = $request->input('status');

    $validatedStatus = null;
    if ($status !== null) {
        $request->validate([
            'status' => 'exists:statuses,id',
        ]);
        $validatedStatus = $status;
    }

    // ✅ 3) запрос ТОЛЬКО для текущего пользователя
    $query = Report::where('user_id', auth()->id());

    if ($validatedStatus) {
        $query->where('status_id', $validatedStatus);
    }

    $reports = $query->orderBy('created_at', $sort)
        ->paginate(5);

    // 4) варианты статусов
    $statuses = Status::all();

    return view('report.index', compact('reports', 'statuses', 'sort', 'status'));
}

    public function destroy(Report $report){
        $report->delete();
        return redirect()->back();
    }

    public function store(Request $request, Report $report)
    {
       $data = $request->validate([
    'number' => ['required', 'string'],
    'description' => ['required', 'string'],
]);
        $data['user_id'] = Auth::user()->id;
        $data['status_id']=1;
        
        $report->create($data);
        return redirect()->back();


    }

    public function edit(Report $report)
{
    if (Auth::user()->id === $report->user_id)
        {
            return view('report.edit', compact('report'));

        }
        else {
            abort(403, 'У вас нет прав на редактирование этой записи');
        }
    
}

        public function update(Request $request, Report $report)
{
    $data = $request->validate([
        'number' => ['required', 'string'],
        'description' => ['required', 'string'],
    ]);

    $report->update($data);

    return redirect()->route('report.index');
}

}
