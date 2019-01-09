<template>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar siswa</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <form class="form-horizontal form-label-left" @submit.prevent="search">
                                <div class="form-group">
                                    <label for="search-siswa" class="col-sm-3 control-label">Cari siswa</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="search-siswa" placeholder="Nama siswa" v-model="keyword">
                                            <span class="input-group-btn">
                                              <button type="button" class="btn btn-primary">Go!</button>
                                          </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <strong>Total: ({{ total }}) siswa</strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>Nama</th>
                                        <th>NISN</th>
                                        <th>Sekolah Asal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(siswa, index) in siswaList" @click="selectSiswa(siswa.ID)" class="clickable">
                                            <td>{{ ((currentPage-1) * perPage) + (index+1) }}</td>
                                            <td>{{ siswa.nama }}</td>
                                            <td>{{ siswa.nisn }}</td>
                                            <td>{{ siswa.sekolah }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer text-center">
                        <simple-pagination ref="pager"
                                           :base-url="urlSiswaList"
                                           :query-param="queryStringSuffix"
                                           @loading-data="clearData"
                                           @data-loaded="displayData"
                                           @load-failed="displayError"
                                           @mounted="pagerMounted"></simple-pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SimplePagination from './SimplePagination.vue';

    export default {
        name: "SiswaList",

        components: {
            SimplePagination
        },

        props: {
            urlSiswaList: String
        },

        data() {
            return {
                keyword: '',
                siswaList: [],
                loading: false,
                pagerRef: null,
            }
        },

        computed: {
            currentPage: function () {
                if (this.pagerRef) {
                    return this.pagerRef.pageData.currentPage;
                }
            },

            perPage: function () {
                if (this.pagerRef) {
                    return this.pagerRef.pageData.perPage;
                }
            },

            total: function () {
                if (this.pagerRef) {
                    return this.pagerRef.pageData.total;
                }
            },

            queryStringSuffix: function () {
                return 'q=' + this.keyword;
            }
        },

        methods: {
            search: function () {
                console.log('search');
                this.pagerRef.loadData(this.urlSiswaList + '?' + this.queryStringSuffix);
            },

            clearData: function () {
                console.log('clear');
                this.loading = true;
            },

            displayError: function (e) {
                console.log(e);
                this.loading = false;
            },

            selectSiswa: function(id) {
                console.log(id);
                window.location.href = "siswa/" + id;
            },

            displayData: function (resp) {
                let vm = this;
                vm.siswaList = resp.data.map(function(item) {
                    return {
                        ID: item.id,
                        nama: item.nama,
                        nisn: item.nisn,
                        sekolah: item.nama_sekolah
                    };
                });

                vm.siswaList.sort(dynamicSortMultiple('nama', 'nisn'));

                this.loading = false;
            },

            pagerMounted: function () {
                this.pagerRef = this.$refs.pager;
            }
        }
    }
</script>
<style scoped>
    .clickable {cursor: pointer;}
</style>
