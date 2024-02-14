<div>
    <div class="row">
        <div class="col-lg-6">

            @livewire('quick-count.saksi-create')

        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5>SAKSI</h5>
                    <ul class="list-group list-group-flush">

                        @forelse ($saksi as $item)
                        <li class="list-group-item text-uppercase py-0">
                            <a class="d-flex justify-content-between align-items-center"
                                href="{{ url('upload-c1/saksi/show/'.$item->id) }}">
                                {{ $item->nama }}
                                <i class='bx bx-right-arrow-alt bx-sm'></i>
                            </a>
                        </li>
                        @empty
                        <li class="list-group-item text-uppercase py-0">
                            Saksi Tidak Ditemukan !!!
                        </li>
                        @endforelse
                    </ul>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $saksi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>