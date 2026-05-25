@extends('layouts.admin')
@section('title', 'Partner - Admin')
@section('page_title', 'Daftar Partner')
@section('page_subtitle', 'Kelola partner kerja sama yang tampil di halaman depan.')

@section('content')
<div class="mb-6 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
    <p class="text-slate-500">Tabel ini menampilkan partner beserta logo dan tanggal dibuat/diubah.</p>
    <div class="flex flex-col sm:flex-row gap-3 items-stretch sm:items-center w-full md:w-auto">
        <form action="{{ route('admin.partners.index') }}" method="GET" class="flex-1">
            <input type="search" name="search" value="{{ old('search', $search ?? '') }}" placeholder="Cari partner..." class="w-full px-5 py-3 rounded-2xl border border-slate-200 bg-white outline-none focus:ring-2 focus:ring-indigo-500 transition" />
        </form>
        <a href="{{ route('admin.partners.create') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold shadow-lg shadow-indigo-100 hover:bg-indigo-700 transition">+ Tambah Partner</a>
    </div>
</div>

@if(session('success'))
<div class="mb-6 rounded-3xl border border-green-200 bg-green-50 px-6 py-4 text-green-800">
    {{ session('success') }}
</div>
@endif

<div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black tracking-widest">
                <tr>
                    <th class="px-8 py-4 w-16">ID</th>
                    <th class="px-8 py-4">Nama</th>
                    <th class="px-8 py-4">Logo</th>
                    <th class="px-8 py-4">Dibuat</th>
                    <th class="px-8 py-4">Terakhir Diubah</th>
                    <th class="px-8 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y border-t">
                @forelse($partners as $partner)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-8 py-6 font-bold text-slate-400">{{ $partner->id }}</td>
                    <td class="px-8 py-6 text-slate-700">{{ $partner->name }}</td>
                    <td class="px-8 py-6">
                        @if($partner->logo_url)
                        <img src="{{ $partner->logo_url }}" alt="Logo {{ $partner->name }}" class="w-20 h-12 object-contain rounded-xl border border-slate-200">
                        @else
                        <span class="text-sm text-slate-500">Tidak ada logo</span>
                        @endif
                    </td>
                    <td class="px-8 py-6 text-sm text-slate-500">{{ $partner->created_at->format('d M Y H:i') }}</td>
                    <td class="px-8 py-6 text-sm text-slate-500">{{ $partner->updated_at->format('d M Y H:i') }}</td>
                    <td class="px-8 py-6">
                        <div class="flex gap-2">
                            <a href="{{ route('admin.partners.edit', $partner->id) }}" class="px-4 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition">Edit</a>
                            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus partner ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-rose-50 text-rose-600 rounded-xl font-bold hover:bg-rose-600 hover:text-white transition">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-8 py-10 text-center text-slate-500">Belum ada partner yang ditambahkan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-8 py-6 bg-slate-50/50 border-t">
        {{ $partners->links() }}
    </div>
</div>
@endsection
