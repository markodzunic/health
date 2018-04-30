<div class="">
    <div class="">
      Name: {{ $report_problem->first_name. ' '. $report_problem->last_name }}
    </div>
    <div class="">
      Position: {{ $report_problem->position?:'N/A' }}
    </div>
    <div class="">
      Practice Name: {{ $report_problem->practice_name?:'N/A' }}
    </div>
    <div class="">
      Phone: {{ $report_problem->phone?:'N/A' }}
    </div>
    <div class="">
      Email: {{ $contact['email']?:'N/A' }}
    </div>
    <div class="">
      Details: {{ $report_problem->description?:'N/A' }}
    </div>
</div>
