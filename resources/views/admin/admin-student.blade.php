<x-admin-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6 bg-gray-900">
        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <button type="button" data-modal-target="createStudentModal" data-modal-toggle="createStudentModal"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Add Student
            </button>
            <div class="relative">
                <input type="text" id="table-search"
                    class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg block w-60 p-2.5 pl-10" 
                    placeholder="Search for students">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
            </div>
        </div>

        <table class="w-full text-sm text-left text-gray-400">
            <thead class="text-xs uppercase bg-gray-800">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>
                    <th scope="col" class="px-6 py-3">Name</th>
                    <th scope="col" class="px-6 py-3">Grade</th>
                    <th scope="col" class="px-6 py-3">Department</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Address</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="border-t border-gray-700 bg-gray-800 hover:bg-gray-700">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $student->name }}</td>
                        <td class="px-6 py-4">{{ $student->grade->name }}</td>
                        <td class="px-6 py-4">{{ $student->department->name }}</td>
                        <td class="px-6 py-4">{{ $student->email }}</td>
                        <td class="px-6 py-4">{{ $student->address }}</td>
                        <td class="px-6 py-4 flex gap-2">
                            <button type="button" 
                                data-modal-target="editStudentModal" 
                                data-modal-toggle="editStudentModal"
                                data-student-id="{{ $student->id }}"
                                data-name="{{ $student->name }}"
                                data-email="{{ $student->email }}"
                                data-address="{{ $student->address }}"
                                data-grade="{{ $student->grade_id }}"
                                class="text-blue-500 hover:underline edit-button">
                                Edit
                            </button>
                            <button type="button"
                                data-modal-target="deleteStudentModal"
                                data-modal-toggle="deleteStudentModal"
                                data-student-id="{{ $student->id }}"
                                class="text-red-500 hover:underline delete-button">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Create Student Modal -->
        <div id="createStudentModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Add New Student</h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="createStudentModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                    <form action="{{ route('admin.students.store') }}" method="POST">
                        @csrf
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                </div>
                                <div class="col-span-6">
                                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                </div>
                                <div class="col-span-6">
                                    <label for="grade_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade</label>
                                    <select name="grade_id" id="grade_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        <option value="">Select Grade</option>
                                        @foreach($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-6">
                                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                    <textarea name="address" id="address" rows="3" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center p-6 space-x-3 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                            <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" data-modal-hide="createStudentModal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Student Modal -->
        <div id="editStudentModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Student</h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editStudentModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                    <form id="editStudentForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label for="edit_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" name="name" id="edit_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                </div>
                                <div class="col-span-6">
                                    <label for="edit_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="email" name="email" id="edit_email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                </div>
                                <div class="col-span-6">
                                    <label for="edit_grade_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Grade</label>
                                    <select name="grade_id" id="edit_grade_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        <option value="">Select Grade</option>
                                        @foreach($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-span-6">
                                    <label for="edit_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                    <textarea name="address" id="edit_address" rows="3" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center p-6 space-x-3 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
                            <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" data-modal-hide="editStudentModal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div id="deleteStudentModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="p-6 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this student?</h3>
                        <form id="deleteStudentForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, delete
                            </button>
                            <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" data-modal-hide="deleteStudentModal">
                                No, cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Handle Edit Button Click
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', (e) => {
                const id = e.target.dataset.studentId;
                const name = e.target.dataset.name;
                const email = e.target.dataset.email;
                const address = e.target.dataset.address;
                const grade = e.target.dataset.grade;

                document.getElementById('editStudentForm').action = `/admin/students/${id}`;
                document.getElementById('edit_name').value = name;
                document.getElementById('edit_email').value = email;
                document.getElementById('edit_address').value = address;
                document.getElementById('edit_grade_id').value = grade;
            });
        });

        // Handle Delete Button Click
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', (e) => {
                const id = e.target.dataset.studentId;
                document.getElementById('deleteStudentForm').action = `/admin/students/${id}`;
            });
        });
    </script>
</x-admin-layout>
