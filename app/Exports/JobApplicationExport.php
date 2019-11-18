<?php

namespace App\Exports;

use App\Models\JobApplication;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class JobApplicationExport implements FromView, ShouldAutoSize
{
	protected $data;
    protected $status;

	/**
	 * Constructs
	 */
	public function __construct($data, $status)
	{
		$this->data = $data;
        $this->status = $status;
	}

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.excel.job_application_'.$this->status, [
            'data' => $this->data
        ]);
    }
}
