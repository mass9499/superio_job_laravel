<?php
namespace Modules\Job\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Modules\Job\Models\JobCandidate;
use Modules\User\Models\Subscriber;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ApplicantsExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

    public function collection()
    {
        return JobCandidate::with('jobInfo', 'candidateInfo')->get();
    }

    /**
     * @var Subscriber $jobCandidate
     * @return array
     */
    public function map($jobCandidate): array
    {
        return [
            ltrim($jobCandidate->candidateInfo->getAuthor->getDisplayName() ?? '',"=-"),
            ltrim($jobCandidate->jobInfo->title,"=-"),
            ltrim($jobCandidate->message,"=-"),
            ltrim(display_date($jobCandidate->created_date),"=-"),
            ltrim($jobCandidate->status,"=-")
        ];
    }

    public function headings(): array
    {
        return [
            'Candidate',
            'Job Title',
            'Message',
            'Date Applied',
            'Status'
        ];
    }
}
