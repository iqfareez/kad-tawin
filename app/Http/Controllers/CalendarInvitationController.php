<?php

namespace App\Http\Controllers;

use App\Models\MajlisDetail;
use DateTime;
use Spatie\CalendarLinks\Link;

class CalendarInvitationController extends Controller
{
    /**
     * Generate Google Calendar link.
     *
     * @param string $slug Slug from MajlisDetail
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function getGoogleCalendar(string $slug)
    {
        $majlisDetail = MajlisDetail::where('slug', $slug)->firstOrFail();

        $link = $this->generateCalendarLinkInstance($majlisDetail);

        return redirect($link->google());
    }

    /**
     * Generate Yahoo Calendar link.
     *
     * @param string $slug Slug from MajlisDetail
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function getYahooCalendar(string $slug)
    {
        $majlisDetail = MajlisDetail::where('slug', $slug)->firstOrFail();

        $link = $this->generateCalendarLinkInstance($majlisDetail);

        return redirect($link->yahoo());
    }

    /**
     * Generate Outlook Calendar link.
     *
     * @param string $slug Slug from MajlisDetail
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function getOutlookCalendar(string $slug)
    {
        $majlisDetail = MajlisDetail::where('slug', $slug)->firstOrFail();

        $link = $this->generateCalendarLinkInstance($majlisDetail);

        return redirect($link->webOutlook());
    }

    /**
     * Download ICS file for a wedding invitation.
     *
     * @param string $slug Slug from MajlisDetail
     * @return \Illuminate\Http\Response
     */
    public function downloadIcs(string $slug)
    {
        $majlisDetail = MajlisDetail::where('slug', $slug)->firstOrFail();

        $link = $this->generateCalendarLinkInstance($majlisDetail);

        return response($link->ics())
            ->header('Content-Type', 'text/calendar')
            ->header('Content-Disposition', 'attachment; filename="undangan-kahwin.ics"');
    }

    /**
     * Generate calendar link instance using Spatie CalendarLinks.
     *
     * @param \App\Models\MajlisDetail $majlisDetail
     * @return \Spatie\CalendarLinks\Link
     */
    private function generateCalendarLinkInstance($majlisDetail)
    {
        $timezone = new \DateTimeZone('Asia/Kuala_Lumpur');
        $from = DateTime::createFromFormat(
            'Y-m-d H:i:s',
            $majlisDetail->majlis_date->format('Y-m-d') . ' ' . date('H:i:s', strtotime($majlisDetail->majlis_start_time)),
            $timezone
        );
        $to = DateTime::createFromFormat(
            'Y-m-d H:i:s',
            $majlisDetail->majlis_date->format('Y-m-d') . ' ' . date('H:i:s', strtotime($majlisDetail->majlis_end_time)),
            $timezone
        );

        $title = $majlisDetail->title ?: 'Undangan Perkahwinan';
        if ($majlisDetail->pengantin_lelaki_first) {
            $title = "{$title} {$majlisDetail->pengantin_lelaki_display_name} & {$majlisDetail->pengantin_perempuan_display_name}";
        } else {
            $title = "{$title} {$majlisDetail->pengantin_perempuan_display_name} & {$majlisDetail->pengantin_lelaki_display_name}";
        }

        $address = trim("{$majlisDetail->venue_address_line_1}\n{$majlisDetail->venue_address_line_2}");

        return Link::create($title, $from, $to)
            ->description('Undangan ke majlis Perkahwinan')
            ->address($address);
    }
}
