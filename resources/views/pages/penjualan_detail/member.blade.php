<div class="modal fade" id="modal-member" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
                 <h5 class="modal-title" id="mediumModalLabel">Pilih Member</h5>
             </div>
             <div class="modal-body">
                 <table id="bootstrap-data-table" class="table table-striped table-bordered table-member">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Nama</th>
                             <th>Telepon</th>
                             <th>Alamat</th>
                             <th><i class="fa fa-cog"></i></th>
                         </tr>
                     </thead>
                     <tbody id="member-table">
                         @foreach ($member as $key => $item )
                             <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->telepon }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                <a href="#" class="btn btn-outline-primary btn-xs btn-flat"
                                    onclick="pilihMember('{{ $item->id_member }}','{{ $item->kode_member }}')">
                                    <i class="fa fa-check-circle"></i>
                                        Pilih
                                    </a>
                                </td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 
 @push('scripts')
 <script type="text/javascript">
     $(document).ready(function() {
       $('#bootstrap-data-table-export').DataTable();
     } );
 </script>
 @endpush
 