@extends('layouts.default')

@section('content')
    <form method="post" action="{{ route('find_query') }}">
        @csrf
        <div class="form-row align-items-center">
            <div class="col-10">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="value_to_find" >
                </div>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary">Find</button>
            </div>
        </div>
    </form>

    <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item  w-100">
            <div class="row gap-20">
                <!-- #Toatl Visits ==================== -->
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Total Visits</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">+10%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- #Total Page Views ==================== -->
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Total Page Views</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash2"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">-7%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- #Unique Visitors ==================== -->
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Unique Visitor</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash3"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">~12%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- #Bounce Rate ==================== -->
                <div class='col-md-3'>
                    <div class="layers bd bgc-white p-20">
                        <div class="layer w-100 mB-10">
                            <h6 class="lh-1">Bounce Rate</h6>
                        </div>
                        <div class="layer w-100">
                            <div class="peers ai-sb fxw-nw">
                                <div class="peer peer-greed">
                                    <span id="sparklinedash4"></span>
                                </div>
                                <div class="peer">
                                    <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-blue-50 c-blue-500">33%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="masonry-item col-md-12">
            <!-- #Todo ==================== -->
            <div class="bd bgc-white p-20">
                <div class="layers">
                    <div class="layer w-100 mB-10">
                        <h6 class="lh-1">Todo List</h6>
                    </div>
                    <div class="layer w-100">
                        <ul class="list-task list-group" data-role="tasklist">
                            <li class="list-group-item bdw-0" data-role="task">
                                <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                    <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
                                    <label for="inputCall1" class=" peers peer-greed js-sb ai-c">
                                        <span class="peer peer-greed">Call John for Dinner</span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item bdw-0" data-role="task">
                                <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                    <input type="checkbox" id="inputCall2" name="inputCheckboxesCall" class="peer">
                                    <label for="inputCall2" class=" peers peer-greed js-sb ai-c">
                                        <span class="peer peer-greed">Book Boss Flight</span>
                                        <span class="peer">
                                <span class="badge badge-pill fl-r badge-success lh-0 p-10">2 Days</span>
                              </span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item bdw-0" data-role="task">
                                <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                    <input type="checkbox" id="inputCall3" name="inputCheckboxesCall" class="peer">
                                    <label for="inputCall3" class=" peers peer-greed js-sb ai-c">
                                        <span class="peer peer-greed">Hit the Gym</span>
                                        <span class="peer">
                                <span class="badge badge-pill fl-r badge-danger lh-0 p-10">3 Minutes</span>
                              </span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item bdw-0" data-role="task">
                                <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                    <input type="checkbox" id="inputCall4" name="inputCheckboxesCall" class="peer">
                                    <label for="inputCall4" class=" peers peer-greed js-sb ai-c">
                                        <span class="peer peer-greed">Give Purchase Report</span>
                                        <span class="peer">
                                <span class="badge badge-pill fl-r badge-warning lh-0 p-10">not important</span>
                              </span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item bdw-0" data-role="task">
                                <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                    <input type="checkbox" id="inputCall5" name="inputCheckboxesCall" class="peer">
                                    <label for="inputCall5" class=" peers peer-greed js-sb ai-c">
                                        <span class="peer peer-greed">Watch Game of Thrones Episode</span>
                                        <span class="peer">
                                <span class="badge badge-pill fl-r badge-info lh-0 p-10">Tomorrow</span>
                              </span>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item bdw-0" data-role="task">
                                <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                    <input type="checkbox" id="inputCall6" name="inputCheckboxesCall" class="peer">
                                    <label for="inputCall6" class=" peers peer-greed js-sb ai-c">
                                        <span class="peer peer-greed">Give Purchase report</span>
                                        <span class="peer">
                                <span class="badge badge-pill fl-r badge-success lh-0 p-10">Done</span>
                              </span>
                                    </label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

