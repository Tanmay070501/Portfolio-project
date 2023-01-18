@extends('layouts.app')
@section('content')
    <main class="flex-grow-1 container-lg d-flex flex-column pt-5 my-5 my-md-0">
        <h1>ABOUT ME</h1>
        <div class="row mt-4">
            <div class="col-md-6">
                <h2>I am <strong>Tanmay Maheshwari</strong></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea nostrum consequuntur, officiis similique cumque debitis illo architecto iste velit laudantium reprehenderit aliquid voluptate! Numquam adipisci aspernatur quis iure, ipsa odit!</p>
            <p><strong>Age: </strong><span>21</span></p>
            <p><strong>Birth Date: </strong><span>07 May, 2001</span></p>
            <p><strong>City: </strong><span>Kota</span></p>
            <p><strong>Email: </strong><a class="text-decoration-none text-dark" href="mailto:tm19534cse2019@gmail.com">tm19534cse2019@gmail.com</a></p>
            </div>
            <div class="col-md-6">
                <h3 class="fw-bold">Skills</h3>
                <div class="d-flex flex-column gap-2">
                    <div>
                        <p class="fs-4 m-0">HTML</p>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div>
                        <p class="fs-4 m-0">CSS</p>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div>
                        <p class="fs-4 m-0">Javascript</p>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div>
                        <p class="fs-4 m-0">C++</p>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div>
                        <p class="fs-4 m-0">React JS</p>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection