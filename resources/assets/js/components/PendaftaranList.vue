<template>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{ title }}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <form class="form-horizontal form-label-left" @submit.prevent="search">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Cari No Pendaftaran</label>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="search-pendaftaran" placeholder="No Pendaftaran" v-model="keyword">
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
                            <strong>Total: ({{ total }}) pendaftaran</strong>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>No Pendaftaran</th>
                                        <th>Tanggal Pendaftaran</th>
                                        <th>Nama Siswa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(pendaftaran, index) in pendaftaranList" @click="selectPendaftaran(pendaftaran.ID)" class="clickable">
                                        <td>{{ ((currentPage-1) * perPage) + (index+1) }}</td>
                                        <td>{{ pendaftaran.no_pendaftaran }}</td>
                                        <td>{{ pendaftaran.tanggal }}</td>
                                        <td>{{ pendaftaran.siswa }}</td>
                                    </tr>
                                    </tbody>
                                    <tfoot></tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer text-center">
                        <simple-pagination ref="pager"
                                           :base-url="urlDataList"
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
        name: "PendaftaranList",

        components: {
            SimplePagination
        },

        props: {
            urlDataList: String,
            title: String
        },

        data() {
            return {
                keyword: '',
                pendaftaranList: [],
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
                this.pagerRef.loadData(this.urlDataList + '?' + this.queryStringSuffix);
            },

            clearData: function () {
                console.log('clear');
                this.loading = true;
            },

            displayError: function (e) {
                console.log(e);
                this.loading = false;
            },

            selectPendaftaran: function(id) {
                console.log(id);
                window.location.href = "pendaftaran/" + id;
            },

            displayData: function (resp) {
                let vm = this;
                vm.pendaftaranList = resp.data.map(function(item) {
                    return {
                        ID: item.id,
                        no_pendaftaran: item.no_pendaftaran,
                        tanggal: item.created_at,
                        siswa: item.siswa.nama
                    };
                });

                vm.pendaftaranList.sort(dynamicSortMultiple('no_pendaftaran', 'tanggal'));

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
