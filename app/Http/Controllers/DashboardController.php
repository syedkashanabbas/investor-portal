<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\Deposit;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();

        $approvedDepositsTotal = Deposit::where('user_id', $user->id)
            ->where('status', 'approved')
            ->sum('amount');

        return view('dashboard', [
            'name' => $user->name,
            'approvedDepositsTotal' => $approvedDepositsTotal,
        ]);
    }

    public function projectStatus()
    {
        $projects = [
            ['id'=>201,'name'=>'Portafoglio Immobiliare Milano','company'=>'Ethica Capital','budget'=>3500000,'progress'=>68,'stage'=>'in_progress','tags'=>['Real Estate','Premium'],'deadline'=>'2025-11-30','risk'=>'medium'],
            ['id'=>202,'name'=>'Fondo Energia Verde','company'=>'Ethica Investimenti','budget'=>5200000,'progress'=>42,'stage'=>'backlog','tags'=>['ESG','Renewables'],'deadline'=>'2026-02-15','risk'=>'low'],
            ['id'=>203,'name'=>'Private Equity Lusso','company'=>'Ethica Partners','budget'=>2400000,'progress'=>81,'stage'=>'review','tags'=>['Luxury','Equity'],'deadline'=>'2025-10-12','risk'=>'high'],
            ['id'=>204,'name'=>'Startup FinTech Roma','company'=>'Ethica Digital','budget'=>900000,'progress'=>100,'stage'=>'done','tags'=>['Tech','FinTech'],'deadline'=>'2025-09-01','risk'=>'low'],
            ['id'=>205,'name'=>'Consorzio Vitivinicolo Toscana','company'=>'Ethica Agro','budget'=>1600000,'progress'=>23,'stage'=>'backlog','tags'=>['Agriculture','Made in Italy'],'deadline'=>'2026-03-20','risk'=>'medium'],
            ['id'=>206,'name'=>'Infrastruttura Portuale Genova','company'=>'Ethica Infra','budget'=>4700000,'progress'=>55,'stage'=>'in_progress','tags'=>['Infra','Logistics'],'deadline'=>'2025-12-18','risk'=>'medium'],
            ['id'=>207,'name'=>'Luxury Resort Sardegna','company'=>'Ethica Real Estate','budget'=>7200000,'progress'=>76,'stage'=>'review','tags'=>['Tourism','Hospitality'],'deadline'=>'2025-10-30','risk'=>'high'],
            ['id'=>208,'name'=>'Fondo Criptovalute','company'=>'Ethica Digital','budget'=>1100000,'progress'=>12,'stage'=>'backlog','tags'=>['Crypto','High Yield'],'deadline'=>'2026-01-25','risk'=>'high'],
            ['id'=>209,'name'=>'Obbligazioni Corporate Italia','company'=>'Ethica Corp','budget'=>2500000,'progress'=>61,'stage'=>'in_progress','tags'=>['Fixed Income','Bonds'],'deadline'=>'2025-11-05','risk'=>'medium'],
            ['id'=>210,'name'=>'Startup Moda Sostenibile','company'=>'Ethica Partners','budget'=>1250000,'progress'=>89,'stage'=>'review','tags'=>['Fashion','Sustainability'],'deadline'=>'2025-09-22','risk'=>'medium'],
            ['id'=>211,'name'=>'Fondo Sicurezza Cibernetica','company'=>'Ethica Security','budget'=>2000000,'progress'=>34,'stage'=>'in_progress','tags'=>['Cybersecurity','Tech'],'deadline'=>'2025-12-28','risk'=>'high'],
            ['id'=>212,'name'=>'Fondo Sanitario Privato','company'=>'Ethica Health','budget'=>1500000,'progress'=>100,'stage'=>'done','tags'=>['Healthcare','Private Equity'],'deadline'=>'2025-08-10','risk'=>'low'],
        ];
        return view('investor.project-status', compact('projects'));
    }


 public function financialReports()
    {
        // Static seed for now (structure-first)
        $reports = [
            ['id'=>1,'company'=>'Ethica Health','title'=>'FY24 Q4','period'=>'2024-Q4','year'=>2024,'quarter'=>'Q4','revenue'=>2480000,'ebitda'=>410000,'gm'=>0.38,'nm'=>0.12,'created_at'=>'2025-08-11 10:02','file'=>'/storage/reports/ethica_health_fy24_q4.pdf','uploader'=>'Prem'],
            ['id'=>2,'company'=>'Ethica Infra','title'=>'FY25 Q1','period'=>'2025-Q1','year'=>2025,'quarter'=>'Q1','revenue'=>1710000,'ebitda'=>220000,'gm'=>0.34,'nm'=>0.09,'created_at'=>'2025-08-25 16:44','file'=>'/storage/reports/ethica_infra_fy25_q1.xlsx','uploader'=>'Ayesha'],
            ['id'=>3,'company'=>'Ethica Logistics','title'=>'FY25 Q1','period'=>'2025-Q1','year'=>2025,'quarter'=>'Q1','revenue'=>920000,'ebitda'=>120000,'gm'=>0.31,'nm'=>0.08,'created_at'=>'2025-08-27 12:19','file'=>'/storage/reports/ethica_logistics_fy25_q1.pdf','uploader'=>'Prem'],
            ['id'=>4,'company'=>'Ethica Digital','title'=>'FY24 Annual','period'=>'2024-Y','year'=>2024,'quarter'=>'Y','revenue'=>3820000,'ebitda'=>530000,'gm'=>0.47,'nm'=>0.15,'created_at'=>'2025-07-30 09:10','file'=>'/storage/reports/ethica_digital_fy24_annual.pdf','uploader'=>'Sara'],
            ['id'=>5,'company'=>'Ethica Corp','title'=>'FY25 Q1','period'=>'2025-Q1','year'=>2025,'quarter'=>'Q1','revenue'=>1330000,'ebitda'=>150000,'gm'=>0.29,'nm'=>0.07,'created_at'=>'2025-08-28 18:04','file'=>'/storage/reports/ethica_corp_fy25_q1.xlsx','uploader'=>'Prem'],
        ];

        // Precompute snapshot (sum/avg) for the visible seed
        $snapshot = [
            'revenue' => array_sum(array_column($reports,'revenue')),
            'ebitda'  => array_sum(array_column($reports,'ebitda')),
            'gm'      => round(array_sum(array_map(fn($r)=>$r['gm'], $reports))/count($reports), 2),
            'nm'      => round(array_sum(array_map(fn($r)=>$r['nm'], $reports))/count($reports), 2),
        ];

        // Simple audit log seed
        $audit = [
            ['at'=>'2025-08-28 18:04','by'=>'Prem','action'=>'Rapporto caricato','what'=>'Ethica Corp • FY25 Q1'],
            ['at'=>'2025-08-27 12:19','by'=>'Prem','action'=>'Rapporto caricato','what'=>'Ethica Logistics • FY25 Q1'],
            ['at'=>'2025-08-25 16:44','by'=>'Ayesha','action'=>'Rapporto caricato','what'=>'Ethica Infra • FY25 Q1'],
            ['at'=>'2025-08-11 10:02','by'=>'Prem','action'=>'Rapporto caricato','what'=>'Ethica Health • FY24 Q4'],
        ];

        return view('investor.financial-reports', compact('reports','snapshot','audit'));
    }


    public function uploadReport(Request $request)
    {
        // Stub: accept file but don’t persist (demo mode)
        // You’ll replace with Storage::putFileAs(...) later.
        return back()->with('ok', 'Demo: upload endpoint hit.');
    }
    public function strategyAccess()
    {
        // No dynamic data yet — view is static
        return view('investor.strategy-access');
    }

    public function investorEducation(){ 
    return view('investor.investor-education');
    }
    
    public function liveUpdates()
    {
        // seed (server would normally push via websockets/queues)
        $initialEvents = [
            ['id'=>1,'ts'=>'2025-09-03 10:05','type'=>'opportunity','channel'=>'Affari','title'=>'JV Farmaceutica – Finestra Series A',
            'msg'=>'Introduzione calda aperta per un ticket da $6–8M, runway 18–24m.', 'severity'=>'info', 'tags'=>['Farmaceutica','Crescita']],
            ['id'=>2,'ts'=>'2025-09-03 10:12','type'=>'project','channel'=>'Progetti','title'=>'Strato Analitico EHR',
            'msg'=>'Fornitore firmato. Avvio lunedì. Budget invariato.', 'severity'=>'success', 'tags'=>['Dati','Sanità']],
            ['id'=>3,'ts'=>'2025-09-03 10:20','type'=>'alert','channel'=>'Rischio','title'=>'Ritardo Catena del Freddo',
            'msg'=>'Blocco doganale aggiunge 5–7 giorni di rischio ai milestone.', 'severity'=>'warning', 'tags'=>['Logistica','HVAC']],
            ['id'=>4,'ts'=>'2025-09-03 10:28','type'=>'alert','channel'=>'Rischio','title'=>'Trovata Audit di Sicurezza',
            'msg'=>'Problema di severità media nella config SSO. Patch in coda.', 'severity'=>'danger', 'tags'=>['SecOps','SSO']],
            ['id'=>5,'ts'=>'2025-09-03 10:33','type'=>'opportunity','channel'=>'Affari','title'=>'PoC Edge 5G Privato',
            'msg'=>'Partner Telco vuole pilota co-finanziato in Q4.', 'severity'=>'info', 'tags'=>['5G','Infra']],
        ];

        $channels = ['Affari','Progetti','Rischio','Operazioni'];

        return view('investor.live-updates', compact('initialEvents','channels'));
    }

    public function support()
    {
        // seed (pretend recent thread)
        $thread = [
            ['id'=>1,'at'=>'2025-09-03 10:02','from'=>'Squadra','name'=>'Team di Supporto','role'=>'agente',
            'msg'=>'Ciao! Chiedi qualsiasi cosa—documenti di investimento, tempistiche o chiarimenti sulla strategia.'],
            ['id'=>2,'at'=>'2025-09-03 10:05','from'=>'Tu','name'=>auth()->user()->name ?? 'Ospite',
            'role'=>'utente','msg'=>'Posso avere un riassunto del report Infra FY25?'],
            ['id'=>3,'at'=>'2025-09-03 10:07','from'=>'Squadra','name'=>'Ayesha (Analista)','role'=>'agente',
            'msg'=>'Certo—caricato in Rapporti Finanziari. Ho anche inviato via email i punti salienti.'],
        ];

        $categories = ['Generale','Progetti','Finanziari','Strategia','Tecnico','Accesso'];
        $priorities = ['Normale','Alto','Urgente'];

        // display name for header
        $displayName = auth()->check() ? (auth()->user()->name ?? 'Utente') : session('guest_name','Ospite');

        return view('investor.support', compact('thread','categories','priorities','displayName'));
    }

    public function supportSend(Request $request)
    {
        // demo: validate + echo back; you’ll persist later
        $data = $request->validate([
            'name'      => 'required|string|max:80',
            'category'  => 'required|string|max:40',
            'priority'  => 'required|string|max:20',
            'message'   => 'required|string|max:4000',
        ]);

        // if you later allow guests, you could store guest name in session
        if (!auth()->check()) {
            session(['guest_name' => $data['name']]);
        }

        // pretend “created” message
        return response()->json([
            'ok'   => true,
            'item' => [
                'id'   => random_int(1000,9999),
                'at'   => now()->format('Y-m-d H:i'),
                'from' => 'Tu',
                'name' => $data['name'],
                'role' => 'utente',
                'msg'  => $data['message'],
                'meta' => ['category'=>$data['category'],'priority'=>$data['priority']],
            ],
            'toast' => 'Messaggio inviato. Il nostro team risponderà qui.'
        ]);
    }

    public function futurePreview()
    {
        // Static teasers (investor-focused)
        $teasers = [
            [
                'id'=>301,'title'=>'Fondo Immobiliare Milano Prime','company'=>'Ethica Capital',
                'sector'=>'Real Estate','stage'=>'analisi_di_mercato','target'=>'2026 H1','cap_need'=>7200000,
                'summary'=>'Acquisizione di immobili premium in centro Milano con focus su rendimento locativo e rivalutazione.',
                'tags'=>['Residenziale','Milano','Premium'],
                'seed'=>'milano-re'
            ],
            [
                'id'=>302,'title'=>'Green Bond Energia Rinnovabile II','company'=>'Ethica Investimenti',
                'sector'=>'Energia','stage'=>'progettazione','target'=>'2026 Q3','cap_need'=>5400000,
                'summary'=>'Seconda emissione di obbligazioni verdi con focus su impianti solari e eolici nel Nord Italia.',
                'tags'=>['GreenBond','ESG','Renewables'],
                'seed'=>'greenbond-2'
            ],
            [
                'id'=>303,'title'=>'Private Equity Lusso & Moda','company'=>'Ethica Partners',
                'sector'=>'Luxury','stage'=>'in_associazione','target'=>'2026 H2','cap_need'=>3900000,
                'summary'=>'Investimento in maison emergenti di moda sostenibile con espansione internazionale.',
                'tags'=>['Moda','Sostenibilità','Equity'],
                'seed'=>'luxury-fashion'
            ],
            [
                'id'=>304,'title'=>'Resort Sardegna Exclusive','company'=>'Ethica Real Estate',
                'sector'=>'Hospitality','stage'=>'po_emesso','target'=>'2026 Q2','cap_need'=>8800000,
                'summary'=>'Sviluppo di un luxury resort fronte mare con brand internazionale e membership privata.',
                'tags'=>['Resort','Tourism','HighNetWorth'],
                'seed'=>'sardegna-resort'
            ],
            [
                'id'=>305,'title'=>'Crypto & Digital Assets Fund','company'=>'Ethica Digital',
                'sector'=>'Finanza Innovativa','stage'=>'in_prova','target'=>'2025 Q4','cap_need'=>3100000,
                'summary'=>'Veicolo di investimento multi-asset con esposizione a criptovalute e token immobiliari.',
                'tags'=>['Crypto','Tokenizzazione','High Yield'],
                'seed'=>'crypto-fund'
            ],
        ];

        $sectors = collect($teasers)->pluck('sector')->unique()->values();
        $stages  = ['analisi_di_mercato','progettazione','in_associazione','in_prova','po_emesso'];
        $years   = ['2025','2026'];

        return view('investor.future-preview', compact('teasers','sectors','stages','years'));
    }


    public function futureInterest(Request $request)
    {
        $data = $request->validate([
            'project_id' => 'required|integer',
            'name'       => 'required|string|max:100',
            'email'      => 'required|email|max:160',
            'note'       => 'nullable|string|max:1000',
        ]);

        // TODO: persist to DB / notify. For now: echo success.
        return response()->json([
            'ok' => true,
            'msg'=> 'Thanks — we’ll reach out with next steps.',
            'ts' => now()->format('Y-m-d H:i')
        ]);
    }


public function privateDocs()
{
    $disk = Storage::disk('private');
    $base = 'investor_docs'; // your main folder for uploads

    // Make sure folder exists
    if (!$disk->exists($base)) {
        $disk->makeDirectory($base);
    }

    // Scan directories and files dynamically
    $allDirs = $disk->allDirectories($base);
    $allFiles = $disk->allFiles($base);

    // Convert to frontend-friendly folder array
    $folders = collect([$base])->merge($allDirs)->map(function ($dir) use ($base) {
        $id = Str::slug(str_replace('/', '_', $dir), '_');
        $parent = dirname($dir);
        $parent = $parent === '.' ? null : Str::slug(str_replace('/', '_', $parent), '_');
        return [
            'id' => $id,
            'name' => basename($dir),
            'parent' => $dir === $base ? null : $parent,
        ];
    })->values()->toArray();

    // Convert files to expected structure
    $files = collect($allFiles)->map(function ($path) use ($disk) {
        $info = pathinfo($path);
        $id = crc32($path);
        $size = $disk->size($path);
        $updated = $disk->lastModified($path);
        return [
            'id' => $id,
            'folder' => Str::slug(str_replace('/', '_', $info['dirname']), '_'),
            'name' => $info['basename'],
            'ext' => $info['extension'] ?? '',
            'size' => $size,
            'updated_at' => date('Y-m-d H:i', $updated),
            'tags' => [],
            'path' => $path,
            'download_url' => URL::temporarySignedRoute(
                'investor.docs.download',
                now()->addDay(),
                ['id' => $id]
            ),
            'preview_img' => "https://picsum.photos/seed/{$id}/600/360",
        ];
    })->values()->toArray();

    $types = collect($files)->pluck('ext')->unique()->values();
    $tags  = collect($files)->flatMap(fn($x) => $x['tags'])->unique()->values();

    return view('investor.private-docs', compact('folders', 'files', 'types', 'tags'));
}
public function privateDocsDownload($id)
{
    $disk = Storage::disk('private');
    $base = 'investor_docs';
    $file = collect($disk->allFiles($base))->first(fn($p) => crc32($p) == $id);

    if (!$file) {
        abort(404);
    }

    return $disk->download($file, basename($file));
}

public function privateDocsUpload(Request $request)
{
    $request->validate([
        'folder' => 'required|string',
        'file' => 'required|file|max:51200', // 50MB
    ]);

    $folder = trim($request->input('folder'));
    $file = $request->file('file');
    $disk = Storage::disk('private');

    $path = "investor_docs/{$folder}";

    if (!$disk->exists($path)) {
        $disk->makeDirectory($path);
    }

    // Store file using original filename
    $fileName = $file->getClientOriginalName();
    $storedPath = $disk->putFileAs($path, $file, $fileName);

    // Build response data
    $fileData = [
        'id' => crc32($storedPath),
        'folder' => Str::slug(str_replace('/', '_', $folder), '_'),
        'name' => $fileName,
        'ext' => $file->getClientOriginalExtension(),
        'size' => $file->getSize(),
        'updated_at' => now()->format('Y-m-d H:i'),
        'tags' => [],
        'path' => $storedPath,
        'download_url' => URL::temporarySignedRoute(
            'investor.docs.download',
            now()->addDay(),
            ['id' => crc32($storedPath)]
        ),
        'preview_img' => "https://picsum.photos/seed/" . urlencode($storedPath) . "/600/360",
    ];
    return redirect()->route('investor.docs')->with('success', 'File uploaded successfully!');

}



public function feedbackIndex()
{
    // Seed a rotating quick poll (demo)
    $poll = [
        'id' => 701,
        'question' => 'Quale area imminente dovremmo priorizzare?',
        'options' => ['Telemed 2.0', 'Data Center Verde', 'Edge 5G Privato', 'Magazzinaggio Intelligente'],
    ];

    // simple sentiment counters for demo display
    $stats = [
        'nps'  => ['promoters'=>18, 'passives'=>6, 'detractors'=>3, 'score'=>18-3], // raw demo numbers
        'csat' => ['avg'=>4.4, 'count'=>41], // 1–5
    ];

    $displayName = auth()->check() ? (auth()->user()->name ?? 'Utente') : 'Ospite';
    $displayEmail = auth()->check() ? (auth()->user()->email ?? '') : '';

    return view('investor.feedback', compact('poll','stats','displayName','displayEmail'));
}


public function feedbackSubmit(Request $request)
{
    $data = $request->validate([
        'name'     => 'required|string|max:80',
        'email'    => 'nullable|email|max:160',
        'anonymous'=> 'boolean',
        'nps'      => 'nullable|integer|min:0|max:10',
        'csat'     => 'nullable|integer|min:1|max:5',
        'text'     => 'nullable|string|max:4000',
        'topic'    => 'nullable|string|max:60',
    ]);

    // TODO: persist to DB or send to Slack/Email
    return response()->json(['ok'=>true, 'msg'=>'Thanks for the feedback!']);
}

public function feedbackPoll(Request $request)
{
    $data = $request->validate([
        'poll_id' => 'required|integer',
        'option'  => 'required|string|max:80',
    ]);
    // TODO: persist vote; one-per-user enforcement server-side
    return response()->json(['ok'=>true, 'msg'=>'Vote recorded.']);
}

}
