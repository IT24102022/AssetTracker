@extends('layouts.admin')

@section('title', 'Assets')

@section('content')

<div
    x-data="{
        qrModal: false,
        selectedAsset: {
            code: '',
            qr: '',
            download: ''
        }
    }"
>

<div class="mb-6 flex flex-wrap items-center justify-between gap-4">
    <h1 class="font-display text-3xl uppercase tracking-tight">Assets</h1>

    <div class="flex gap-3">
        <a href="{{ route('export.assets') }}" class="btn-brutal-ghost">
            Export Excel
        </a>
        <a href="{{ route('assets.create') }}" class="btn-brutal-accent">
            + Add Asset
        </a>
    </div>
</div>

<!-- Search & Filter -->
<form method="GET" class="card-brutal mb-6 grid grid-cols-1 gap-3 p-4 md:grid-cols-5">

    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="SEARCH CODE / NAME / SERIAL..."
        class="input-brutal placeholder:font-mono">

    <select name="category" class="input-brutal">
        <option value="">All Categories</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(request('category') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <select name="status" class="input-brutal">
        <option value="">All Status</option>
        <option value="Available" @selected(request('status') == 'Available')>Available</option>
        <option value="Assigned" @selected(request('status') == 'Assigned')>Assigned</option>
        <option value="Maintenance" @selected(request('status') == 'Maintenance')>Maintenance</option>
        <option value="Retired" @selected(request('status') == 'Retired')>Retired</option>
    </select>

    <button type="submit" class="btn-brutal-primary">
        Search
    </button>

    <a href="{{ route('assets.index') }}" class="btn-brutal-ghost">
        Reset
    </a>

</form>

@if ($assets->count())

<div class="mb-3 font-mono text-xs uppercase tracking-widest text-ink/60">
    Showing <span class="font-bold text-ink">{{ $assets->total() }}</span> asset(s)
</div>

<div class="card-brutal overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>
                <tr class="border-b-3 border-ink bg-ink text-paper">
                    <th class="p-3 text-left font-mono text-xs uppercase tracking-widest">Code</th>
                    <th class="p-3 text-left font-mono text-xs uppercase tracking-widest">Name</th>
                    <th class="p-3 text-left font-mono text-xs uppercase tracking-widest">Category</th>
                    <th class="p-3 text-left font-mono text-xs uppercase tracking-widest">Status</th>
                    <th class="p-3 text-left font-mono text-xs uppercase tracking-widest">Cost</th>
                    <th class="p-3 text-center font-mono text-xs uppercase tracking-widest">Actions</th>
                </tr>
            </thead>

            <tbody>
            @foreach ($assets as $asset)
                <tr class="border-b-2 border-ink/15 hover:bg-tag/10">

                    <td class="p-3">
                        <a
                            href="#"
                            @click.prevent="
                                qrModal = true;
                                selectedAsset = {
                                    code: '{{ $asset->asset_code }}',
                                    qr: '{{ route('assets.qr', $asset) }}',
                                    download: '{{ route('assets.qr.download', $asset) }}'
                                };
                            "
                            class="font-mono text-sm font-bold underline decoration-2 underline-offset-2 hover:bg-tag"
                        >
                            {{ $asset->asset_code }}
                        </a>
                    </td>

                    <td class="p-3 font-mono text-sm">{{ $asset->name }}</td>

                    <td class="p-3 font-mono text-sm text-ink/70">{{ optional($asset->category)->name }}</td>

                    <td class="p-3">
                        @switch($asset->status)
                            @case('Available')
                                <span class="stamp stamp-go">Available</span>
                                @break
                            @case('Assigned')
                                <span class="stamp stamp-wire">Assigned</span>
                                @break
                            @case('Maintenance')
                                <span class="stamp stamp-hold">Maintenance</span>
                                @break
                            @case('Retired')
                                <span class="stamp stamp-signal">Retired</span>
                                @break
                            @default
                                <span class="stamp stamp-mute">{{ $asset->status }}</span>
                        @endswitch
                    </td>

                    <td class="p-3 font-mono text-sm">${{ number_format($asset->cost, 2) }}</td>

                    <td class="p-3 text-center">
                        <a
                            href="{{ route('assets.edit', $asset) }}"
                            class="font-mono text-xs font-bold uppercase underline decoration-2 underline-offset-2 mr-4">
                            Edit
                        </a>

                        <form
                            action="{{ route('assets.destroy', $asset) }}"
                            method="POST"
                            class="inline">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                onclick="return confirm('Are you sure you want to delete this asset?')"
                                class="font-mono text-xs font-bold uppercase text-signal underline decoration-2 underline-offset-2">
                                Delete
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>

        </table>

    </div>

</div>

<div class="mt-6 font-mono text-sm">
    {{ $assets->links() }}
</div>

@else

<div class="card-brutal p-10 text-center">
    <p class="font-mono text-sm uppercase tracking-widest text-ink/50">No assets found.</p>
    <a href="{{ route('assets.create') }}" class="btn-brutal-accent mt-5 inline-flex">
        Add Your First Asset
    </a>
</div>

@endif

<!-- QR Code Modal -->
<div
    x-show="qrModal"
    x-transition.opacity
    x-cloak
    class="fixed inset-0 z-50 flex items-center justify-center bg-ink/70 p-4"
    style="display: none;"
>

    <div
        @click.outside="qrModal = false"
        class="card-brutal !shadow-brutal-lg w-full max-w-md p-6"
    >

        <h2 class="font-display text-xl uppercase tracking-tight text-center">
            Asset QR Code
        </h2>

        <div class="mt-6 text-center">

            <p class="font-mono text-xs font-bold uppercase tracking-widest text-ink/60">Asset Code</p>
            <p class="mb-5 font-mono text-lg font-bold" x-text="selectedAsset.code"></p>

            <img
                :src="selectedAsset.qr"
                alt="QR Code"
                class="mx-auto h-64 w-64 border-3 border-ink"
            >

            <p class="mt-5 font-mono text-xs text-ink/60">
                Scan with your mobile phone to view this asset's information.
            </p>

        </div>

        <div class="mt-8 flex justify-center gap-3">

            <a :href="selectedAsset.download" download class="btn-brutal-accent">
                Download QR
            </a>

            <button @click="qrModal = false" class="btn-brutal-ghost">
                Close
            </button>

        </div>

    </div>

</div>

</div>

@endsection
