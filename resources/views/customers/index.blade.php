@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="font-size: 2em">
                    <a>Todos os dados dos clientes!</a>
                    <button @click="destroyData" type="submit" class="btn btn-danger" style="float: right; margin-top:5px;">Apagar dados</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Sobrenome</th>
                                <th>Email</th>
                                <th>Genero</th>
                                <th>Endereço IP</th>
                                <th>Empresa</th>
                                <th>Cidade</th>
                                <th>Titulo</th>
                                <th>Website</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr v-for="(customer, index) in customers.data">
                                <th>@{{customer.first_name}}</th>
                                <th>@{{customer.last_name}}</th>
                                <th>@{{customer.email}}</th>
                                <th>@{{customer.gender}}</th>
                                <th>@{{customer.ip_address}}</th>
                                <th>@{{customer.company}}</th>
                                <th>@{{customer.city}}</th>
                                <th>@{{customer.title}}</th>
                                <th>@{{customer.website}}</th>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 p-0">
                        <table class="w-100">
                            <tr>
                                <td>
                                    <button @click="prevPage" type="submit" class="btn btn-primary" style="margin: 10px">Página anterior</button>
                                </td>
                                <td align="right">
                                    <button @click="nextPage" type="submit" class="btn btn-primary" style="margin: 10px">Próxima página</button>
                                </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<span style="padding: 10px;"></span>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header" style="font-size: 2em">Tabela de sobrenome cliente</div>

                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Clientes com sobrenome</th>
                                <th>Clientes sem sobrenome</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <th>@{{customerswln}}</th>
                                <th>@{{customerswtln}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header" style="font-size: 2em">Tabela de genero cliente</div>

                <div class="table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Cliente com genero</th>
                                <th>Cliente sem genero</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <th>@{{customerswg}}</th>
                                <th>@{{customerswtg}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

<script>
    var app = new Vue({
        el: '#app',
        data() {
            return{
            current_page: 1,
            customers: [],
            customerswg: 0,
            customerswtg: 0,
            customerswln: 0,
            customerswtln: 0,
            }
        },
        methods: {
            nextPage() {
                this.current_page++;
                this.fetchCustomers();
            },
            prevPage() {
                if(this.current_page > 1)
                {
                    this.current_page--;
                    this.fetchCustomers();
                }
            },
            async destroyData() {
                try{
                    const res = await fetch(`/api/destroydata`);
                } catch (error) {
                    console.log(error)
                }
            },
            async fetchCustomers() {
                try {
                    const res = await fetch(`/api/customers?page=${this.current_page}`);
                    const data = await res.json();
                    this.customers     = data.customers;
                    this.customerswg   = data.customerswg;
                    this.customerswtg  = data.customerswtg;
                    this.customerswln  = data.customerswln;
                    this.customerswtln = data.customerswtln;
                    console.log(data);
                } catch (error) {
                    console.log(error)
                }
            },
        },
        mounted() {
            this.fetchCustomers();
        }
    });

</script>
@endpush
