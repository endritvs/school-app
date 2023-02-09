<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (Session::has('msg'))
                <div id="alert-border-3" class="flex p-4 mb-4 text-green-700 bg-green-100 border-t-4 border-green-500 dark:text-green-400 dark:bg-gray-800" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div class="ml-3 text-sm font-medium">
                        {!! \Session::get('msg') !!}
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-300 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
                      <span class="sr-only">Dismiss</span>
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
              @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table id="results" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
<div class="grid grid-rows-2 grid-flow-col gap-2">
 <div>
    
<!-- Modal toggle -->
<button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="mt-3 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Create
  </button>
  
  <!-- Main modal -->
  <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
      <div class="relative w-full h-full max-w-md md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="authentication-modal">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="px-6 py-6 lg:px-8">
                  <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Create</h3>
                  <form class="space-y-6" method="POST" action="{{route('store.class.course.group')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="class_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Class</label>
                        <select id="class_id" name="class_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          @foreach ($classes as $class)
                            <option value="{{$class->id}}">{{$class->class_name}}</option>
                            @endforeach
                        </select>
                              <x-input-error :messages="$errors->get('class_id')" class="mt-2" />
                    </div>
                        <div class="mb-3">
                            <label for="course_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Course</label>
                            <select id="course_id" name="course_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                              @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->name}}</option>
                                @endforeach
                            </select>
                                  <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
                        </div>

                        <div class="mb-3">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Start</label>
                            <input type="datetime-local" value="{{old('date_start')}}" name="date_start" id="date_start" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Name">
                            <x-input-error :messages="$errors->get('date_start')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Start</label>
                            <input type="datetime-local" value="{{old('date_end')}}" name="date_end" id="date_end" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Name">
                            <x-input-error :messages="$errors->get('date_end')" class="mt-2" />
                        </div>
                      <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                  </form>
              </div>
          </div>
      </div>
  </div> 
  
 </div>

</div>   


        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                   Course Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Class Name
                 </th>
                 <th scope="col" class="px-6 py-3">
                    Teachers
                 </th>
                 <th scope="col" class="px-6 py-3">
                    Number of Students
                 </th>
                 <th scope="col" class="px-6 py-3">
                    Date Start of Course              
                 </th>
                 <th scope="col" class="px-6 py-3">
                    Date End of Course              
                 </th>
                <th scope="col" class="px-6 py-3">
                 Delete             
                </th>
            </tr>
        </thead>
        <tbody>
            {{-- @dd($data) --}}
            @foreach($data as $classCourseGroup)
    <tr id="search-results" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{$classCourseGroup['id']}}
        </th>
        <td class="px-6 py-4">
            {{$classCourseGroup['course_name']}}
        </td>
        <td class="px-6 py-4">
            {{$classCourseGroup['class_name']}}
        </td>
        <td class="px-6 py-4">
        {{ $classCourseGroup['teacher_names'] }}
        </td>
        <td class="px-6 py-4">
            {{ $classCourseGroup['student_count']}}
        </td>
        <td class="px-6 py-4">
            {{$classCourseGroup['date_start']}}
        </td>
        <td class="px-6 py-4">
            {{$classCourseGroup['date_end']}}
        </td>
        <td class="px-6 py-4 text-right text-center">
            <a data-modal-toggle="popup-modal{{$classCourseGroup['id']}}"  class="float-left font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
        </td>
    </tr>
            
  
  <div id="popup-modal{{$classCourseGroup['id']}}" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
      <div class="relative w-full h-full max-w-md md:h-auto">
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal{{$classCourseGroup['id']}}">
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                  <span class="sr-only">Close modal</span>
              </button>
              <div class="p-6 text-center">
                  <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this course?</h3>
                  <form class="space-y-6" method="POST" action="{{route('class.course.group.destroy',$classCourseGroup['id'])}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                </form>
                  <button data-modal-hide="popup-modal{{$classCourseGroup['id']}}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
              </div>
          </div>
      </div>
  </div>
        @endforeach
        </tbody>
    </table>
    {{$data->links()}}
</div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>