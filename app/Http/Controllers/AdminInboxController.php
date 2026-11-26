<?php

namespace App\Http\Controllers;

use App\Models\ContactRequest;
use App\Models\ConvenioRequest;
use App\Models\InternshipRequest;
use App\Models\JobApplication;
use App\Support\AdminStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminInboxController extends Controller
{
    public function citas(Request $request)
    {
        $items = $this->filtered(ContactRequest::citas(), $request, ['name', 'email', 'phone', 'subject', 'message'])->paginate(20)->withQueryString();

        return view('admin.inbox.index', [
            'title' => 'Citas y «Lo llamamos»',
            'subtitle' => 'Solicitudes de cita y pedidos de llamada',
            'items' => $items,
            'showRoute' => 'admin.citas.show',
            'exportRoute' => 'admin.citas.export',
            'kind' => 'cita',
        ]);
    }

    public function showCita(ContactRequest $contact)
    {
        abort_unless($contact->isCita(), 404);

        return view('admin.inbox.show-contact', [
            'item' => $contact,
            'title' => 'Solicitud de cita',
            'backRoute' => 'admin.citas.index',
            'updateRoute' => 'admin.citas.update',
        ]);
    }

    public function updateCita(Request $request, ContactRequest $contact)
    {
        abort_unless($contact->isCita(), 404);
        $this->updateInbox($request, $contact);

        return back()->with('success', 'Solicitud actualizada.');
    }

    public function exportCitas(): StreamedResponse
    {
        $rows = ContactRequest::citas()->latest()->get();

        return $this->csv('citas.csv', ['Fecha', 'Nombre', 'Email', 'Teléfono', 'Asunto', 'Estado', 'Mensaje'], $rows->map(function (ContactRequest $c) {
            return [
                $c->created_at?->format('Y-m-d H:i'),
                $c->name,
                $c->email,
                $c->phone,
                $c->subject,
                AdminStatus::label($c->status),
                str_replace(["\r", "\n"], ' ', $c->message),
            ];
        }));
    }

    public function mensajes(Request $request)
    {
        $items = $this->filtered(ContactRequest::mensajes(), $request, ['name', 'email', 'phone', 'subject', 'message'])->paginate(20)->withQueryString();

        return view('admin.inbox.index', [
            'title' => 'Mensajes',
            'subtitle' => 'Formulario «Escríbanos»',
            'items' => $items,
            'showRoute' => 'admin.mensajes.show',
            'exportRoute' => 'admin.mensajes.export',
            'kind' => 'mensaje',
        ]);
    }

    public function showMensaje(ContactRequest $contact)
    {
        abort_if($contact->isCita(), 404);

        return view('admin.inbox.show-contact', [
            'item' => $contact,
            'title' => 'Mensaje',
            'backRoute' => 'admin.mensajes.index',
            'updateRoute' => 'admin.mensajes.update',
        ]);
    }

    public function updateMensaje(Request $request, ContactRequest $contact)
    {
        abort_if($contact->isCita(), 404);
        $this->updateInbox($request, $contact);

        return back()->with('success', 'Mensaje actualizado.');
    }

    public function exportMensajes(): StreamedResponse
    {
        $rows = ContactRequest::mensajes()->latest()->get();

        return $this->csv('mensajes.csv', ['Fecha', 'Nombre', 'Email', 'Teléfono', 'Asunto', 'Estado', 'Mensaje'], $rows->map(function (ContactRequest $c) {
            return [
                $c->created_at?->format('Y-m-d H:i'),
                $c->name,
                $c->email,
                $c->phone,
                $c->subject,
                AdminStatus::label($c->status),
                str_replace(["\r", "\n"], ' ', $c->message),
            ];
        }));
    }

    public function jobs(Request $request)
    {
        $items = $this->filtered(JobApplication::query(), $request, ['nombre', 'apellido', 'email', 'telefono', 'profesion', 'cargo'])->paginate(20)->withQueryString();

        return view('admin.jobs.index', compact('items'));
    }

    public function showJob(JobApplication $job)
    {
        return view('admin.jobs.show', ['item' => $job]);
    }

    public function updateJob(Request $request, JobApplication $job)
    {
        $this->updateInbox($request, $job);

        return back()->with('success', 'Postulación actualizada.');
    }

    public function downloadJob(JobApplication $job)
    {
        return $this->downloadLocal($job->file_path, 'hoja-de-vida');
    }

    public function internships(Request $request)
    {
        $items = $this->filtered(InternshipRequest::query(), $request, ['nombre', 'apellido', 'email', 'telefono', 'universidad', 'programa'])->paginate(20)->withQueryString();

        return view('admin.internships.index', compact('items'));
    }

    public function showInternship(InternshipRequest $internship)
    {
        return view('admin.internships.show', ['item' => $internship]);
    }

    public function updateInternship(Request $request, InternshipRequest $internship)
    {
        $this->updateInbox($request, $internship);

        return back()->with('success', 'Solicitud actualizada.');
    }

    public function downloadInternship(InternshipRequest $internship)
    {
        return $this->downloadLocal($internship->file_path, 'practicas');
    }

    public function convenios(Request $request)
    {
        $items = $this->filtered(ConvenioRequest::query(), $request, ['institucion', 'representante', 'email', 'telefono', 'tipo'])->paginate(20)->withQueryString();

        return view('admin.convenios.index', compact('items'));
    }

    public function showConvenio(ConvenioRequest $convenio)
    {
        return view('admin.convenios.show', ['item' => $convenio]);
    }

    public function updateConvenio(Request $request, ConvenioRequest $convenio)
    {
        $this->updateInbox($request, $convenio);

        return back()->with('success', 'Convenio actualizado.');
    }

    public function downloadConvenio(ConvenioRequest $convenio)
    {
        return $this->downloadLocal($convenio->file_path, 'convenio');
    }

    private function filtered(Builder $query, Request $request, array $searchCols): Builder
    {
        $status = $request->query('status');
        if ($status && array_key_exists($status, AdminStatus::OPTIONS)) {
            $query->where('status', $status);
        }

        $q = trim((string) $request->query('q'));
        if ($q !== '' && $searchCols) {
            $query->where(function (Builder $inner) use ($q, $searchCols) {
                foreach ($searchCols as $i => $col) {
                    $i === 0
                        ? $inner->where($col, 'like', "%{$q}%")
                        : $inner->orWhere($col, 'like', "%{$q}%");
                }
            });
        }

        return $query->latest();
    }

    private function updateInbox(Request $request, Model $model): void
    {
        $validated = $request->validate([
            'status' => 'required|in:new,in_progress,done,discarded',
            'admin_notes' => 'nullable|string|max:3000',
        ]);

        $model->update($validated);
    }

    private function downloadLocal(?string $path, string $fallback)
    {
        if (!$path || !Storage::disk('local')->exists($path)) {
            abort(404, 'Archivo no disponible.');
        }

        return Storage::disk('local')->download($path, $fallback . '-' . basename($path));
    }

    private function csv(string $filename, array $headers, $rows): StreamedResponse
    {
        return response()->streamDownload(function () use ($headers, $rows) {
            $out = fopen('php://output', 'w');
            fprintf($out, chr(0xEF) . chr(0xBB) . chr(0xBF));
            fputcsv($out, $headers, ';');
            foreach ($rows as $row) {
                fputcsv($out, $row, ';');
            }
            fclose($out);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
