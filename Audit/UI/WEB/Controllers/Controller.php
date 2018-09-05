<?php

namespace App\Containers\Audit\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use App\Containers\Audit\UI\WEB\Requests\ShowAuditRequest;
use App\Containers\Audit\Models\Audit;

class Controller extends WebController
{
    public function index()
    {
        $audits = Audit::
            // TODO: Lloric, add config for this, this filter allowed result, suggested: blocklist/whilelist
            //     where('auditable_type', 'App\Containers\Claim\Models\Claim')
            // ->orWhere('auditable_type', 'App\Containers\File\Models\File')
            // ->
            paginate(50);

            
        return view('audit::index')->withAudits($audits);
    }

    public function show(ShowAuditRequest $request)
    {
        $audit = Audit::find($request->id);
        $modified = $audit->getModified();
        return view('audit::show')
                    ->withAudit($audit)
                    ->withModified($modified);
    }
}
