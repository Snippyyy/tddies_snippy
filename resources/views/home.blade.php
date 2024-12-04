@foreach($courses as $course)
    <h2>{{$course->title}}</h2>
    <h4>{{$course->description}}</h4>
@endforeach
