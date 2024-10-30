<h1>Dashboard do Admin</h1>
<x-action.logout/>


{{--<form method="POST" action="{{ url('logout') }}">--}}
{{--    @csrf--}}
{{--    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">--}}
{{--        {{ __('Log Out') }}--}}
{{--    </button>--}}
{{--</form>--}}


<ul>
    <li><a href="{{ route('admin.create', 'employee') }}">Create New Employee</a></li>
    <li><a href="{{ route('admin.create', 'client') }}">Create New Client</a></li>
    <li><a href="{{ route('admin.index', 'employee') }}">View All Employees</a></li>
    <li><a href="{{ route('admin.index', 'client') }}">View All Clients</a></li>
</ul>