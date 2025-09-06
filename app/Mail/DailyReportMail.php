<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelFormat;
use App\Exports\RidesExport;

class DailyReportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    protected $rides;

    public function __construct($rides)
    {
        $this->rides = $rides;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Daily Rides Report',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.rides_report',
        );
    }

    public function attachments(): array
    {
        $excelContent = Excel::raw(new RidesExport($this->rides), ExcelFormat::XLSX);

        return [
            Attachment::fromData(fn () => $excelContent, 'rides_report.xlsx')
                ->withMime('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'),
        ];
    }
}
