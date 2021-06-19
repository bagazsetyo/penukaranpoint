@extends('layouts.user')

@section('title', 'Point')

@section('content')
<section class="section" id="point">
    <div class="section-header">
      <h1>Point</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('user.dashboard.index') }}">Dashboard</a></div>
        <div class="breadcrumb-item">Penukaran Point</div>
      </div>
    </div>
    
    <div class="row">
        <div class="col-12 mb-3">
          <a href="{{ route('user.gift.index') }}" class="btn btn-primary">Lihat History Penukaran <i class="fas fa-angle-double-right"></i></a>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Digunakan</h4>
              </div>
              <div class="card-body">
                @{{ digunakan }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-money-bill-alt"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Sisa</h4>
              </div>
              <div class="card-body">
                @{{ all - digunakan }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-gift"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Semua Point</h4>
              </div>
              <div class="card-body">
                @{{ all }}
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="row" v-if="gift.length > 0">
        <div class="col-6 col-lg-3 col-md-4 col-sm-6" v-for="item in gift" :key="item.id">
            <div class="card">
                <img class="card-img-top" :src="'/image/' + item.image" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text"><h5 class="text-capitalize">@{{ item.name }}</h5></p>
                    <p class="card-text">point : @{{ item.point }}</p>
                    <p class="card-text">sisa : @{{ item.qty }}</p>
                    <button :disabled="disabled" class="btn btn-success btn-sm" @click="tukar( item.id )" v-if="item.point <= (all - digunakan) && item.qty > 0">Tukar</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('after-script')
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  var locations = new Vue({
    el: "#point",
    mounted() {
      this.getpoint();
    },
    data: {
      gift: [],
      all: 0,
      digunakan: 0,
      disabled: false,
    },
    methods: {
      getpoint() {
        var self = this;
        axios.get('{{ route('api.point') }}')
          .then(function (response) {
            self.gift = response.data.data.gift;
            self.all = response.data.data.all;
            self.digunakan = response.data.data.detailgift;
          })
      },
      tukar(idgift) {
        var self = this;
        self.disabled = true;
        let submitData = {
            'gift_id' : idgift,
            'point' : self.all - self.digunakan,
        };
        axios.post('{{ route('api.point.store') }}',submitData)
        .then(function (data) {
            self.getpoint();    
            self.disabled = false;
        });
        self.disabled = false;
      },
    },
  });
</script>
@endpush