<div class="container">
    <div class="row">
      <div class="col-md-5 col-md-offset-1">

        <div class="panel panel-default">
          <div class="panel-heading panel-title">Role Assignments</div>
          <div class="panel-body">

            <p>Available roles:</p>
            @foreach($roles as $r)
              @if($r->name == 'Member')
                @continue
              @endif
              <ul class="listBox">
                <li>{{$r->name}}
                  <ul class="listBox">
                    @foreach ($r->users as $u)
                      <li>{{$u->name}}</li>
                    @endforeach
                  </ul>
                </li>
              </ul>
            @endforeach
          </div>
        </div>
      </div>

      <div class="col-md-5">
        <div class="panel panel-default">
          <div class="panel-heading panel-title">Role Assignments</div>
          <div class="panel-body">
            <p>Users WITHOUT "Member" role:</p>
            <ul class="listBox">
              @foreach($nonmembers as $u)
                <li><a href="/members/{{ $u->id }}">{{ $u->name }}</a> ({{ $u->weekend }})</li>
              @endforeach
            </ul>
            <ul class="listBox">
              @foreach($dosen as $dsn)
                <li><a href="/members/{{ $dsn->id }}">{{ $dsn->name }}</a> ({{ $u->weekend }})</li>
              @endforeach
            </ul>
          </div>
        </div>


      </div>
    </div>
  </div>