@if(session()->has('message'))

    <div 
    {{-- using Aaphinejs --}}
        x-data="{show:true}"
        {{-- After 3 seconds the value of show will be set to false ---}}
        x-init="setTimeout(()=>show=false,3000)" 
        x-show="show" 
        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-red-500 text-white px-48 py-3">
        {{-- //sesssion is a global variable that is available in all views 
            which is used to store data across requests in the session --}}
        <p>{{session('message')}}</p>
    </div>

@endif