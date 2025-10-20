<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Models\Deposit;

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

// public function projectStatus()
// {
//     $projects = [
//         ['id'=>101,'name'=>'Espansione della Rete Clinica','company'=>'Ethica Health','budget'=>850000,'progress'=>62,'stage'=>'in_progress','tags'=>['Sanità','CapEx'],'deadline'=>'2025-10-15','risk'=>'medium'],
//         ['id'=>102,'name'=>'Rifacimento del Data Center','company'=>'Ethica Infra','budget'=>1200000,'progress'=>35,'stage'=>'backlog','tags'=>['Infra','Verde'],'deadline'=>'2026-01-20','risk'=>'low'],
//         ['id'=>103,'name'=>'Aggiornamento Logistica Farmaceutica','company'=>'Ethica Logistics','budget'=>410000,'progress'=>88,'stage'=>'review','tags'=>['Operazioni','Automazione'],'deadline'=>'2025-09-28','risk'=>'high'],
//         ['id'=>104,'name'=>'App Mobile per Telemedicina','company'=>'Ethica Digital','budget'=>260000,'progress'=>100,'stage'=>'done','tags'=>['SaaS','Mobile'],'deadline'=>'2025-08-20','risk'=>'low'],
//         ['id'=>105,'name'=>'Progetto Pilota 5G Privato','company'=>'Ethica Networks','budget'=>540000,'progress'=>18,'stage'=>'backlog','tags'=>['R&D','5G'],'deadline'=>'2026-02-11','risk'=>'medium'],
//         ['id'=>106,'name'=>'Strato Analitico EHR','company'=>'Ethica Health','budget'=>330000,'progress'=>47,'stage'=>'in_progress','tags'=>['Dati','BI'],'deadline'=>'2025-12-05','risk'=>'medium'],
//         ['id'=>107,'name'=>'Magazzinaggio Intelligente','company'=>'Ethica Logistics','budget'=>760000,'progress'=>72,'stage'=>'review','tags'=>['IoT','Robotica'],'deadline'=>'2025-11-12','risk'=>'high'],
//         ['id'=>108,'name'=>'Catena del Freddo Farmaceutica','company'=>'Ethica Infra','budget'=>680000,'progress'=>9,'stage'=>'backlog','tags'=>['Conformità','HVAC'],'deadline'=>'2026-03-01','risk'=>'low'],
//         ['id'=>109,'name'=>'Rinnovo del Ciclo dei Ricavi','company'=>'Ethica Digital','budget'=>295000,'progress'=>58,'stage'=>'in_progress','tags'=>['FinOps','Automazione'],'deadline'=>'2025-10-02','risk'=>'medium'],
//         ['id'=>110,'name'=>'Distribuzione Chioschi Pazienti','company'=>'Ethica Health','budget'=>210000,'progress'=>83,'stage'=>'review','tags'=>['UX','Hardware'],'deadline'=>'2025-09-21','risk'=>'medium'],
//         ['id'=>111,'name'=>'Rafforzamento della Sicurezza','company'=>'Ethica Corp','budget'=>450000,'progress'=>26,'stage'=>'in_progress','tags'=>['SecOps','ZeroTrust'],'deadline'=>'2025-12-28','risk'=>'high'],
//         ['id'=>112,'name'=>'E-Prescrizione Farmacie','company'=>'Ethica Digital','budget'=>190000,'progress'=>100,'stage'=>'done','tags'=>['RegTech','API'],'deadline'=>'2025-07-30','risk'=>'low'],
//     ];
//     return view('investor.project-status', compact('projects'));
// }

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
    // Folder + file seed (IDs are stable)
    $folders = [
        ['id'=>'root', 'name'=>'Tutti i Documenti', 'parent'=>null],
        ['id'=>'legal', 'name'=>'Legale', 'parent'=>'root'],
        ['id'=>'finance', 'name'=>'Finanziari', 'parent'=>'root'],
        ['id'=>'deals', 'name'=>'Sale Affari', 'parent'=>'root'],
        ['id'=>'reports', 'name'=>'Rapporti', 'parent'=>'finance'],
        ['id'=>'tax', 'name'=>'Tasse & Conformità', 'parent'=>'finance'],
    ];

    $files = [
        ['id'=>9001,'folder'=>'legal','name'=>'NDA Reciproco (v3).pdf','ext'=>'pdf','size'=>356_112,'updated_at'=>'2025-08-21 11:30','tags'=>['NDA','Legale'],'path'=>'legal/nda_v3.pdf'],
        ['id'=>9002,'folder'=>'legal','name'=>'Accordo Master dei Servizi.docx','ext'=>'docx','size'=>198_772,'updated_at'=>'2025-08-19 09:14','tags'=>['Contratti','MSA'],'path'=>'legal/msa.docx'],
        ['id'=>9101,'folder'=>'reports','name'=>'Pacchetto FY25 Q1.xlsx','ext'=>'xlsx','size'=>824_000,'updated_at'=>'2025-08-28 18:04','tags'=>['Finanziari','Trimestrale'],'path'=>'finance/reports/fy25_q1.xlsx'],
        ['id'=>9102,'folder'=>'reports','name'=>'Risultati Annuali FY24.pdf','ext'=>'pdf','size'=>1_820_544,'updated_at'=>'2025-07-30 17:12','tags'=>['Finanziari','Annuale'],'path'=>'finance/reports/fy24_annual.pdf'],
        ['id'=>9201,'folder'=>'tax','name'=>'Dichiarazioni IVA 2024.zip','ext'=>'zip','size'=>6_502_300,'updated_at'=>'2025-08-09 15:55','tags'=>['Tasse'],'path'=>'finance/tax/vat_2024.zip'],
        ['id'=>9301,'folder'=>'deals','name'=>'Telemed 2.0 – Teaser.pdf','ext'=>'pdf','size'=>512_441,'updated_at'=>'2025-08-27 10:02','tags'=>['Affare','Teaser'],'path'=>'deals/telemed_teaser.pdf'],
        ['id'=>9302,'folder'=>'deals','name'=>'5G Edge – CIM.pdf','ext'=>'pdf','size'=>2_103_331,'updated_at'=>'2025-09-01 09:40','tags'=>['Affare','CIM'],'path'=>'deals/5g_edge_cim.pdf'],
    ];

    // Generate signed links (valid 24h). Swap to Storage::temporaryUrl if using S3.
    foreach ($files as &$f) {
        $f['download_url'] = URL::temporarySignedRoute(
            'investor.docs.download',
            now()->addDay(),
            ['id' => $f['id']]
        );
        // demo preview (images only get real preview; others use placeholders)
        $f['preview_img'] = "https://picsum.photos/seed/".urlencode($f['id'])."/600/360";
    }
    unset($f);

    // Type chips for filters
    $types = collect($files)->pluck('ext')->unique()->values();
    $tags  = collect($files)->flatMap(fn($x)=>$x['tags'])->unique()->values();

    return view('investor.private-docs', compact('folders','files','types','tags'));
}

public function privateDocsDownload($id)
{
    // In real app fetch file from DB/storage by $id and authorize
    $map = [
        9001 => ['path'=>'legal/nda_v3.pdf','download'=>'Mutual NDA (v3).pdf'],
        9002 => ['path'=>'legal/msa.docx','download'=>'Master Services Agreement.docx'],
        9101 => ['path'=>'finance/reports/fy25_q1.xlsx','download'=>'FY25 Q1 Pack.xlsx'],
        9102 => ['path'=>'finance/reports/fy24_annual.pdf','download'=>'FY24 Annual Results.pdf'],
        9201 => ['path'=>'finance/tax/vat_2024.zip','download'=>'VAT Filings 2024.zip'],
        9301 => ['path'=>'deals/telemed_teaser.pdf','download'=>'Telemed 2.0 – Teaser.pdf'],
        9302 => ['path'=>'deals/5g_edge_cim.pdf','download'=>'5G Edge – CIM.pdf'],
    ];
    if (!isset($map[$id])) abort(404);

    // Demo: return a simple message instead of real file I/O.
    // Replace with: return Storage::disk('private')->download($map[$id]['path'], $map[$id]['download']);
    return response("Demo mode: would download {$map[$id]['download']}", 200, [
        'Content-Type' => 'text/plain; charset=utf-8'
    ]);
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
