<template>
    <ul class="pagination" v-show="hasMorePages">
        <li class="disabled" v-show="!allowGoToPrevPage"><span>{{ pageData.prevPageText }}</span></li>
        <li v-show="allowGoToPrevPage"><a href="#" rel="prev" @click="goToPrev">{{ pageData.prevPageText }}</a></li>
        <li v-show="allowGoToNextPage"><a href="#" rel="next" @click="goToNext">{{ pageData.nextPageText }}</a></li>
        <li class="disabled" v-show="!allowGoToNextPage"><span>{{ pageData.nextPageText }}</span></li>
    </ul>
</template>

<script>
    export default {
        name: "SimplePagination",

        props: {
            baseUrl: String,
            queryParam: {
                type: String,
                default: ''
            },
            queryParamHasPrefix: {
                type: Boolean,
                default: false
            },
            requesting: {
                type: Boolean,
                default: false
            }
        },

        data() {
            return {
                loading: false,
                pageData: {
                    currentPage: -1,
                    firstPageUrl: '',
                    from: -1,
                    lastPage: -1,
                    lastPageUrl: '',
                    nextPageUrl: '',
                    path: '',
                    perPage: 15,
                    prevPageUrl: '',
                    to: 15,
                    total: 15,
                    nextPageText: 'next',
                    prevPageText: 'prev'
                }
            };
        },

        computed: {
            allowGoToPrevPage: function () {
                return !this.requesting && !this.loading && !this.onFirstPage;
            },

            allowGoToNextPage: function () {
                return !this.requesting && !this.loading && this.hasMorePages;
            },

            hasPages: function () {
                return this.pageData.currentPage > 1 || this.hasMorePages;
            },

            hasMorePages: function () {
                return this.pageData.currentPage < this.pageData.lastPage;
            },

            onFirstPage: function () {
                return this.pageData.currentPage <= 1;
            }
        },

        methods: {
            loadData: function (url) {
                this.$emit('loading-data');
                this.loading = true;

                var vm = this;
                $.get(url)
                    .done(resp => {
                        vm.$emit('data-loaded', resp);

                        vm.pageData.currentPage = resp.current_page;
                        vm.pageData.firstPageUrl = resp.first_page_url;
                        vm.pageData.from = resp.from;
                        vm.pageData.lastPage = (resp.last_page ? resp.last_page : (resp.next_page_url ? (resp.current_page + 1) : resp.current_page));
                        vm.pageData.lastPageUrl = resp.last_page_url;
                        vm.pageData.nextPageUrl = resp.next_page_url;
                        vm.pageData.path = resp.path;
                        vm.pageData.perPage = resp.per_page;
                        vm.pageData.prevPageUrl = resp.prev_page_url;
                        vm.pageData.to = resp.to;
                        vm.pageData.total = resp.total;
                    })
                    .fail(e => {
                        vm.$emit('load-failed', e);
                        console.log(e)
                    })
                    .always(function () {
                        vm.loading = false;
                    });
            },

            goToNext: function() {
                this.loadData(this.pageData.nextPageUrl + (this.queryParam ? "&" + this.queryParam : ""));
            },

            goToPrev: function() {
                this.loadData(this.pageData.prevPageUrl + (this.queryParam ? "&" + this.queryParam : ""));
            }
        },

        watch: {

        },

        mounted() {
            if (this.baseUrl) {
                this.loadData(this.baseUrl + (this.queryParam ? (this.queryParamHasPrefix ? "&" : "?") + this.queryParam : ""));
            }

            this.$emit('mounted');
        }
    }
</script>

<style scoped>
    .clickable {cursor: pointer;}
</style>