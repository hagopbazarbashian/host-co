@extends('layout.app')
@section('main-content')
<style>
body{
  padding: 1em;
  background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAcAAAAHCAYAAADEUlfTAAAAQElEQVQIW2P89OvDfwYo+PHjJ4zJwMHBzsAIk0SXAKkCS2KTAEu++vQSbizIKGQAl0SXAJkGlsQmAbcT2Shk+wH0sCzAEOZW1AAAAABJRU5ErkJggg==);
}
a{
  color: #739931;
}
.page{
  max-width: 60em;
  margin: 0 auto;
}
table th,
table td{
  text-align: left;
}
table.layout{
  width: 100%;
  border-collapse: collapse;
}
table.display{
  margin: 1em 0;
}
table.display th,
table.display td{
  border: 1px solid #B3BFAA;
  padding: .5em 1em;
}

table.display th{ background: #D5E0CC; }
table.display td{ background: #fff; }

table.responsive-table{
  box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
  margin: 130px 0 80px 0;

}

@media (max-width: 30em){
    table.responsive-table{
      box-shadow: none;  
      margin: 90px 0 0 0;
    }
    table.responsive-table thead{
      display: none; 
    }
  table.display th,
  table.display td{
    padding: .5em;
  }
    
  table.responsive-table td:nth-child(1):before{
    content: 'Number';
  }
  table.responsive-table td:nth-child(2):before{
    content: 'Name';
  }
  table.responsive-table td:nth-child(1),
  table.responsive-table td:nth-child(2){
    padding-left: 25%;
  }
  table.responsive-table td:nth-child(1):before,
  table.responsive-table td:nth-child(2):before{
    position: absolute;
    left: .5em;
    font-weight: bold;
  }
  
    table.responsive-table tr,
    table.responsive-table td{
        display: block;
    }
    table.responsive-table tr{
        position: relative;
        margin-bottom: 1em;
    box-shadow: 0 1px 10px rgba(0, 0, 0, 0.2);
    }
    table.responsive-table td{
        border-top: none;
    }
    table.responsive-table td.organisationnumber{
        background: #D5E0CC;
        border-top: 1px solid #B3BFAA;
    }
    table.responsive-table td.actions{
        position: absolute;
        top: 0;
        right: 0;
        border: none;
        background: none;
    }
}

</style>

<div class="page">
   <table class="layout display responsive-table">
       <thead>
           <tr>
               <th>Id</th>
               <th colspan="2">Link / Date</th>
               <th colspan="2">Action</th>
           </tr>
       </thead>
       <tbody>
        @php
         use Carbon\Carbon;  
        @endphp
       @foreach ($transfers as $transfer)
       <tr>
        <td class="organisationnumber">{{$transfer->user_id}}</td>
        <td class="organisationnumber">
            <a href="http://127.0.0.1:8000/storage/uploads/{{$transfer->file_path}}" target="_blank">
                {{$transfer->file_path}}
            </a>
        </td>
        <td class="date">{{ Carbon::parse($transfer->delete_time)->format('Y M D') }}</td> <!-- Add a date field here -->
        <td class="organisationname">
            <a href="#" class="edit-item" title="Copy" onclick="copyToClipboard('http://127.0.0.1:8000/storage/uploads/{{$transfer->file_path}}')">Copy</a>
        </td>
       </tr>
       @endforeach
       </tbody>
   </table>
   </div>
   <script>
    function copyToClipboard(text) {
        // Create a temporary element
        const tempInput = document.createElement('input');
        tempInput.style.position = 'absolute';
        tempInput.style.left = '-9999px';
        tempInput.value = text;
        
        // Add it to the document and select its contents
        document.body.appendChild(tempInput);
        tempInput.select();
        tempInput.setSelectionRange(0, 99999); // For mobile devices
        
        // Execute the copy command
        document.execCommand('copy');
        
        // Remove the temporary element
        document.body.removeChild(tempInput);
        
        // Optionally notify the user
        alert('Copied to clipboard: ' + text);
    }
    </script>
@endsection
