<div class="modal fade" id="ajaxModel" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h4 class="modal-title" id="modelHeading"></h4>
           </div>
           <div class="modal-body">
               <form id="contactForm" name="contactForm" class="form-horizontal needs-validation" novalidate>
                   <input type="hidden" name="contact_id" id="contact_id">
                   
                   <div class="form-group">
                       <div class="col-sm-12">
                           <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name"
                                  value="" maxlength="50" autocomplete="off" required >
                       </div>
                   </div>
                   
                   <div class="form-group">
                       <div class="col-sm-12">
                           <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name"
                                  value="" maxlength="50" autocomplete="off" required>
                       </div>
                   </div>

                   <div class="form-group">
                       <div class="col-sm-12">
                           <input type="email" class="form-control" id="email" name="email"
                                  placeholder="Enter email "
                                  value="" maxlength="50" autocomplete="off" required>
                       </div>
                   </div>

                   <div class="col-sm-offset-2 col-sm-10">
                       <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                   </div>
               </form>
           </div>
       </div>
   </div>
</div>