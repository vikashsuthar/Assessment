<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    books: {
        type: Array
    },
    test: {
        type: String
    }
});
var search_option ="";

</script>
<template>
    <Head title="BooKs" />
    <header class="header navbar navbar-expand-lg bg-light shadow-sm shadow-dark-mode-none fixed-top mb-5">
        <div class="container px-3">
            <a href="" class="navbar-brand pe-3">
                Book
            </a>
            <div id="navbarNav" class="offcanvas offcanvas-end">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                        <li class="nav-item">
                            <a href="/" class="nav-link">Boos List</a>
                        </li>
                    </ul>
                </div>
                <!-- for mobile  -->
                <div class="offcanvas-header border-top">
                    <a href="/login" class="btn btn-primary w-100" target="_blank" rel="noopener">
                        <i class="bx bx-cart fs-4 lh-1 me-1"></i>
                        &nbsp;Log In
                    </a>
                </div>
                <!-- for mobile -->
            </div>

            <button type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="/login" class="btn btn-primary btn-sm fs-sm rounded d-none d-lg-inline-flex" target="_blank" rel="noopener">
                <i class="bx bx-cart fs-5 lh-1 me-1"></i>
                &nbsp;Log In
            </a>
        </div>
    </header>
    <div class="p-3"></div>
    <section class="container mt-5 mb-lg-5 pt-lg-2 pb-5">

        <!-- Page title + Layout switcher + Search form -->
        <div class="row align-items-end gy-3 mb-4 pb-lg-3 pb-1">
            <div class="col-lg-5 col-md-4">
                <h1 class="mb-2 mb-md-0">Blog Grid</h1>
            </div>
            <div class="col-lg-7 col-md-8">
                <form class="row gy-2" method="get" action="/">
                    <div class="col-lg-4 col-sm-5">
                        <div class="d-flex align-items-center">
                            <div class="nav flex-nowrap me-sm-4 me-3">
                                <a href="blog-list-no-sidebar.html" class="nav-link me-2 p-0" aria-label="List view">
                                    <i class="bx bx-list-ul fs-4"></i>
                                </a>
                                <a href="blog-grid-no-sidebar.html" class="nav-link p-0 active" aria-label="Grid view">
                                    <i class="bx bx-grid-alt fs-4"></i>
                                </a>
                            </div>
                            <select class="form-select" v-model="search_option" name="search_option">
                                <option selected value="">All</option>
                                <option value="title">Title</option>
                                <option value="author">Author</option>
                                <option value="published">Published</option>
                                <option value="genre">Genre</option>
                                <option value="isbn">isbn</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-5">
                        <div class="input-group">
                            <input type="text" class="form-control pe-5 rounded" placeholder="Search the blog..." name="search">
                            <i
                                class="bx bx-search position-absolute top-50 end-0 translate-middle-y me-3 zindex-5 fs-lg"></i>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <div class="input-group">
                            <input type="submit" class="btn btn-primary  rounded" value="Search">
                        </div>
                    </div>
                </form>
            </div>
        </div>
            <div class="row">
            <!-- Item -->
            <div class="col-3 mt-5" v-for="book in books.data" v-if="books.length != 0">
                <div class="card" >
                    <img v-bind:src=" book.image " class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ book.title }}</h5>
                        <p class="card-text">{{ book.description }}</p>
                        <a v-bind:href="'/book/show/'+book.id" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5"  v-else>
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">Nothing Found</h5>
                        <p class="card-text">Try searching Somthing else!!</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <nav aria-label="Page navigation ">
            <ul class="pagination justify-content-center pt-md-4 pt-2">
                <li class="page-item" >
                    <a v-bind:href="books.first_page_url" class="page-link active " v-if="books.current_page == 1">
                       First Page
                    </a>
                    <a v-bind:href="books.first_page_url" class="page-link" v-else>
                        First Page
                    </a>
                </li>

                <li class="page-item" >
                    <a v-bind:href="books.prev_page_url" class="page-link" v-if="books.prev_page_url">
                        Previous Page
                    </a>
                    <a href="#" class="page-link disabled" v-else>
                        Previous Page
                    </a>
                </li>
                <li class="page-item" >
                    <a href="#" class="page-link  disabled">
                        {{ books.current_page }}
                    </a>
                </li>

                <li class="page-item" >
                    <a v-bind:href="books.next_page_url" class="page-link" v-if="books.next_page_url">
                        Next Page
                    </a>
                    <a href='#' class="page-link disabled" v-else>
                        Next Page
                    </a>
                </li>

                <li class="page-item" >
                    <a href="#" class="page-link active" v-if="books.current_page == books.last_page">
                        Last Page
                    </a>
                    <a v-bind:href="books.last_page_url" class="page-link" v-else>
                        Last Page
                    </a>
                </li>
            </ul>
        </nav>

    </section>
</template>


