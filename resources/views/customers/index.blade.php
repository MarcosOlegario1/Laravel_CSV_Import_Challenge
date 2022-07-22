@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="font-size: 2em">Dados dos Clientes!</div>

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
                            <tr v-for="(customer, index) in customers">
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
            async fetchCustomers() {
                try {
                    const res = await fetch(`/api/customers?page=${this.current_page}`);
                    const data = await res.json();
                    this.customers = data.data;
                    console.log(this.customers);
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
