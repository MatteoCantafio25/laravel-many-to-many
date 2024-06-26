@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <header>
        <h1>Projects</h1>
    </header>

    <hr>

    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Type</th>
            <th scope="col">Technology</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th>
                <div class="d-flex justify-content-end">
                    <!-- Bottone nuovo Progetto -->
                    <a href="{{route('admin.projects.create')}}" class="btn btn-sm btn-success">
                        <i class="fas fa-plus me-2"></i>New Project
                    </a>
                </div>
            </th>
          </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr>
              <th scope="row">{{$project->id}}</th>
              <td>{{$project->title}}</td>
              <td>{{$project->slug}}</td>
              <td>
                @if($project->type)
                    <span class="badge" style="background-color: {{$project->type->color}}">{{$project->type->label}}</span>
                @else
                    None 
                @endif
              </td>
              <td>
                @forelse ($project->technologies as $tech)
                    <span class="badge rounded-pill text-bg-{{$tech->color}}">{{$tech->label}}</span>
                @empty
                    None
                @endforelse
              </td>
              <td>{{$project->created_at}}</td>
              <td>{{$project->updated_at}}</td>
              <td>
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{route('admin.projects.show', $project)}}" class="btn btn-sm btn-primary">
                        <i class="fas fa-eye"></i>
                    </a>

                    <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-sm btn-warning">
                        <i class="fas fa-pencil"></i>
                    </a>
        
                    <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit">
                            <i class="fas fa-trash-can"></i>
                        </button>
                    </form>
                </div>
              </td>
            </tr>
                
            @empty
                <tr>
                    <td colspan="8">
                        <h3 class="text-center">Non ci sono post</h3>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginazione -->
    @if ($projects->hasPages())
        {{$projects->links()}}
    @endif

    <!-- Sezione per vedere quanti projects ci sono per ogni categoria -->
    <section class="my-3" id="types-projects">
        <hr class="my-3">
        <h3>Project for each type</h3>
        <div class="row row-cols-3">
            @foreach ($types as $type)
                <div class="col">
                    <h4 class="my-3">{{$type->label}} ({{$type->projects_count}})</h4>
                    
                    @forelse ($type->projects as $project)
                        <div>
                            <a href="{{route('admin.projects.show', $project->id)}}" class="text-decoration-none">{{$project->title}}</a>
                        </div>
                    @empty
                        <p class="mb-0">There are no projects for this type</p>
                    @endforelse

                </div>
            @endforeach
        </div>
    </section>


@endsection

@section('scripts')
      @vite('resources/js/delete_confirmation.js')
@endsection