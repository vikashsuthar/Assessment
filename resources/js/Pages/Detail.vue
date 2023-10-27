<script setup>
import { Head, Link } from '@inertiajs/vue3';
defineProps({
    book: {
        type: Object
    },
    test: {
        type: String
    }
});

</script>

<template>
    <Head title="Book" />
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

        <div class="row">
            <!-- Item -->
            <div class="col-12 mt-5">
                <div class="card">

                    <div class="card-body">
                        <div class="row">

                            <div class="col-3" style="padding-left: 50px;">
                                <img v-bind:src="book.image" class="card-img-top rounded-5">
                            </div>
                            <div class="col-8 ">
                                <div style="padding-left: 50px;padding-top: 30px;">
                                    <h2 class="card-title mb-4" style="font-family:cursive ;">{{ book.title }}</h2>
                                    <p class="card-text">{{ book.description }}</p>
                                    <h4>Author : <span class="subtext">{{ book.author }} </span></h4>
                                    <h5>Genre : <span class="subtext2">{{ book.genre }} </span></h5>
                                    <h5>ISBN : <span class="subtext2">{{ book.isbn }} </span></h5>
                                    <h5>Published : <span class="subtext2">{{ book.published }} </span></h5>
                                    <h5>Publisher : <span class="subtext">{{ book.publisher }} </span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style>
    .subtext {
        font-style: oblique;
        font-family:cursive;
        font-size: larger;
    }
    .subtext2 {
        font-size: medium;
        font-weight: 400;
    }
</style>
