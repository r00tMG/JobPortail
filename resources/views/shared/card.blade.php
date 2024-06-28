
<div class="card bg-gradient-default">
    <div class="card-body">
      
      <h5 class="font-weight-normal text-info text-gradient"><a href="{{ route('emplois.show',['emploi' => $emploi]) }}">{{ $emploi->titre }}</a></h5>
      <p class="text-muted">{{$emploi->users->email}}</p>
      <p class="text-muted">{{$emploi->lieu}}</p>
      <blockquote class="blockquote text-white mb-0">
        <p class="text-dark ms-3">{{ $emploi->description }}</p>
        <footer class="blockquote-footer text-gradient text-info text-sm ms-3">Someone famous in <cite title="Source Title">Source Title</cite></footer>
      </blockquote>
    </div>
    <div class="row">
      <div class="col-md-2">
          <a href="{{route('emplois.edit',$emploi)}}" type="button" class="btn bg-gradient-primary">Editer</a>
      </div>
      <div class="col-md-2">
          <form action="{{route('emplois.destroy',$emploi)}}" method="post">
              @csrf  
              @method('DELETE')      
              <button class="btn bg-gradient-secondary">Delete</button>
          </form>
      </div>
  </div>
</div>
