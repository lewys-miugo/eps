<div>
    <div class="">
        <ul class="gray-300 list-none flex flex-row  pl-4 mx-4 text-[#46555f]">
            <li class=" grow border-y-2 transition ease-in-out	delay-200 duration-100 hover:border-t-[#c45472]">
                <a href="{{-- route('shop') --}}">
                    <p class="mx-2 my-2 uppercase text-sm font-bold hover:text-[#273137]">All</p>
                </a>
            </li>
            @foreach($campuses as $campus)
                <li class="grow border-y-2 transition ease-in-out	delay-200 duration-100 hover:border-t-[#c45472]"><a href="{{-- route('product.campus',['slug'=>$campus->slug]) --}}" class="mx-2 my-2 uppercase text-sm font-bold hover:text-[#273137]">{{$campus->name}}</a></li>

            @endforeach
        </ul>
    </div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="m-4 flex flex-col-12">
        <div class="m-2 ">
            <div>
                <p class="text-left text-xs text-[#6a767e]"><a href="/" class="uppercase">Home</a> > All Users > By {{$campus_name}}</p>
            </div>

            <div class="flex flex-row pt-8">
                <img src="{{asset('images/campuss')}}/{{$campus->image}}" alt="" class="w-32 h-auto">
                
                <p class="m-4 justify-center text-[#46555f] uppercase">
                    {{$campus_name}} <span> | USers</span> 
                </p>
                
            </div>
            <!-- subcolor -->
            <div class="bg-[#f2f3f4] flex flex-col-12">
                <div class="flex justify-left text-[#46555f] m-2">
                    <!-- border-b-4 border-[#B76573] -->
                    @if (count($campus->departments)>0)
                        <ul class="flex flex-row">
                            @foreach ($campus->departments as $department)
                                <a href="{{route('art.campus',['slug'=>$campus->slug,'department_slug'=>$department->slug])}}" class="flex flex-row">
                                    <img src="{{asset('images/colors')}}/{{$department->image}}" alt="" class="h-4 w-8">
                                    <li class="mx-2 font-bold uppercase text-sm ">
                                        {{$department->name}}
                                    </li>
                                </a>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>


            <!-- Number of pieces -->
            <div class="flex justify-end my-4">
                <div>
                <p class=" text-[#46555f] text-sm"> We have found {{$users->total()}} employees</p>
                </div>
            </div>

            <!-- Product shop -->
            <div>
                <div class="mb-8">
                    <div class="flex flex-row flex-wrap">
                        <!-- Trending 1 -->
                        @foreach($users as $user)
                            <div class="flex flex-col m-2">
                                <a href="{{ --route('product.details',['slug'=>$product->slug]) --}}">
                                    <ul class="flex flex-row text-[#46555f] text-base pl-2">
                                    <li class="text-xs">{{$user->name}}</li>
                                    </ul>
                                    <div class="flex flex-row">
                                        
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                    <div>

                    </div>
                    <!-- Pagination -->
                    <div>
                        {{$users->links()}}
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
