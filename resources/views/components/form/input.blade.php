@props(['name','type'=>'text','value'=>''])
<x-form.input-wrapper>
    <label for="{{$name}}" class="form-label">{{ucwords($name)}}</label>
    <input type="{{$type}}" name="{{$name}}" class="form-control" id="usename" value="{{old($name,$value)}}" aria-describedby="textHelp"> 
    <x-error :name="$name"/>
</x-form.input-wrapper>
