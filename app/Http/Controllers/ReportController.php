<?php

namespace App\Http\Controllers;
use App\Models\Status;
use App\Models\Report;
use Illuminate\Http\Request;





class ReportController extends Controller
{
   
public function index(Request $request)
{
    // 1) сортировка
    $sort = $request->input('sort'); // ожидаем 'asc' или 'desc'
    if ($sort !== 'asc' && $sort !== 'desc') {
        $sort = 'desc'; // по умолчанию сначала новые
    }

    // 2) фильтр по статусу
    $status = $request->input('status'); // это id статуса (1/2/3)

    // Валидация статуса (если передали)
    $validatedStatus = null;
    if ($status !== null) {
        // если status не существует в statuses.id — будет ошибка 422, так и задумано методичкой
        $request->validate([
            'status' => 'exists:statuses,id',
        ]);
        $validatedStatus = $status;
    }

    // 3) собираем запрос
    if ($validatedStatus) {
        $reports = Report::where('status_id', $validatedStatus)
            ->orderBy('created_at', $sort)
            ->paginate(5);
    } else {
        $reports = Report::orderBy('created_at', $sort)
            ->paginate(5);
    }

    // 4) получаем варианты статусов для ссылок на странице
    $statuses = Status::all();

    // 5) отдаём в представление и сами параметры, чтобы можно было подставлять их в ссылки
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

        
        $report->create($data);
        return redirect()->back();


    }

    public function edit(Report $report)
{
    return view('report.edit', compact('report'));
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
