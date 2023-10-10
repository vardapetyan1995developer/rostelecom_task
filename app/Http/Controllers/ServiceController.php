<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceStoreRequest;
use App\Http\Requests\ServiceUpdateRequest;
use App\Models\Service;
use App\Services\RosTelecomService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class ServiceController extends Controller
{
    public function __construct(
        private readonly RosTelecomService $rosTelecomService,
    )
    { }

    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        $services = $this->rosTelecomService->getAllServicesPaginated();

        return view('services.index', compact('services'));
    }

    /**
     * @return Renderable
     */
    public function suggestedServices(): Renderable
    {
        $services = $this->rosTelecomService->getSuggestedServices();

        return view('services.suggested', compact('services'));
    }

    /**
     * @return JsonResponse
     */
    public function disabledServices(): JsonResponse
    {
        $services = $this->rosTelecomService->getDisabledServices();

        return response()->json(['disabledServices' => $services]);
    }

    /**
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('services.create');
    }

    /**
     * @param ServiceStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ServiceStoreRequest $request): RedirectResponse
    {
        $result = $this->rosTelecomService->createService($request->validated());

        if (!$result)
            return redirect()->route('services.index')->with(['fail' => 'Creation error']);

        return redirect()->route('services.index')->with(['success' => 'Created successfully']);
    }

    public function show(Service $service)
    {
        //
    }

    /**
     * @param Service $service
     * @return Renderable
     */
    public function edit(Service $service): Renderable
    {
        return view('services.edit', compact('service'));
    }

    public function update(ServiceUpdateRequest $request, Service $service)
    {
        $result = $this->rosTelecomService->updateService($service, $request->validated());

        if (!$result)
            return redirect()->route('services.index')->with(['fail' => 'Update error']);

        return redirect()->route('services.index')->with(['success' => 'Updated successfully']);
    }

    /**
     * @param Service $service
     * @return RedirectResponse
     */
    public function destroy(Service $service): RedirectResponse
    {
        $result = $service->delete();

        if (!$result)
            return redirect()->route('services.index')->with(['fail' => 'Deletion error']);

        return redirect()->back()->with(['success' => 'Deleted successfully']);
    }
}
