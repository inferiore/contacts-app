 <div class="container">
     <div>
         <a href="{{route('auth.logout')}}">logout</a>
     </div>
     <div class="row">
         <div clas="col-6"></div>
         <h3>Contact List</h3>
         <table border="1">
             <thead>
             <tr>
             <th>Name</th>
             <th>data of birth</th>
             <th>franchise</th>
             <th>credit card</th>
             </tr>
             </thead>
             <tbody>
             @foreach ($users as $user)
                 <tr>
                     <td>
                         {{ $user->name }}
                     </td>
                     <td>
                         {{ $user->birth_date }}
                     </td>
                     <td>
                         {{ $user->franchise }}
                     </td>
                     <td>
                         {{ $user->credit_card_last_numbers }}
                     </td>
                 </tr>
             @endforeach
             </tbody>
         </table>

         {{ $users->links() }}
     </div>
     <br>
     <div class="col-6">
         <form method="POST" action="/contacts/import" enctype ="multipart/form-data">
             @csrf
             <label for="contacts">Upload your CSV file</label>
             <input type="file" name="contacts" required>
             <br>
             <input type="submit">
         </form>

     </div>
     </div>
 </div>



