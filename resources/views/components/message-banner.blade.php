
@if($type=="success")
<div class="flex justify-center bg-green-100 border-black text-green-500 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">success</strong>
    <span class="block sm:inline">{{$message}}</span>
</div>
@else
    <div class="flex justify-center bg-red-100 border-black text-red-500 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">error</strong>
        <span class="block sm:inline">{{$message}}</span>
    </div>
@endif
