<form action="<?= url("/admin/setting"); ?>" method="POST" enctype="multipart/form-data">
  <div class="card-body">
    <div class="row">
      <?php view("components/flashMessage.php"); ?>
      <div class="col-md-12">
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" name="title" placeholder="Enter Project Name"
            value="<?php if(isset($formData["title"]) && $formData["title"]!==null) echo $formData["title"]; ?>" >
        </div>
      </div>
    </div>
   

    <div class="row">
      <div class="col-md-4">
        <div class="imageBox">
          <div class="image">
              <?php 
                if(isset($formData["logo"]) && $formData["logo"] !==null){ ?>
                    <img src="<?= assets("Upload/Settings/".$formData["logo"]) ?>" id="logo" style="height:150px; width:150px;">
                  <?php }
                else{ ?>
                  <img id="logo">
                <?php }
              ?>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Main Logo</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input logo"  name="logo" onchange="myfunction(this)">
              <label id="level_logo" class="custom-file-label" for="logoLevel">Choose file</label>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="imageBox">
          <div class="image">
              <?php 
                if(isset($formData["favicon"]) && $formData["favicon"] !==null){ ?>
                    <img src="<?= assets("Upload/Settings/".$formData["favicon"]) ?>" id="favicon" style="height:150px; width:150px;">
                  <?php }
                else{ ?>
                  <img id="favicon">
                <?php }
              ?>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Fav Icon</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="favicon" onchange="myfunction(this)">
              <label id="level_favicon" class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="imageBox">
          <div class="image"> 
              <?php 
                if(isset($formData["navLogo"]) && $formData["navLogo"] !==null){ ?>
                    <img src="<?= assets("Upload/Settings/".$formData["navLogo"]) ?>" id="navLogo" style="height:150px; width:150px;">
                  <?php }
                else{ ?>
                  <img id="navLogo">
                <?php }
              ?>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Navigation Bar Logo</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="navLogo" onchange="myfunction(this)">
              <label id="level_navLogo" class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputFile">Home Video</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="video">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputFile">Notice Status</label>
          <select name="notice_status" class="form-control">
            <option value="1" <?php if(isset($formData["notice_status"]) && $formData["notice_status"]==1) echo"selected"; ?> >Active</option>
            <option value="0" <?php if(isset($formData["notice_status"]) && $formData["notice_status"]==0) echo"selected"; ?> >InActive</option>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="exampleInputFile">Event Status</label>
          <select name="event_status" class="form-control">
            <option value="1" <?php if(isset($formData["event_status"]) && $formData["event_status"]==1) echo"selected"; ?> >Active</option>
            <option value="0" <?php if(isset($formData["event_status"]) && $formData["event_status"]==0) echo"selected"; ?> >InActive</option>
          </select>
        </div>
      </div>
    </div>



    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputPassword1">Prject Section Text</label>
          <textarea class="form-control" name="project_section_text">
            <?php if(isset($formData["project_section_text"]) && $formData["project_section_text"]!==null) echo $formData["project_section_text"]; ?>
          </textarea>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="description">Partner Section Text</label>
          <textarea class="form-control" name="partners_section_text">
            <?php if(isset($formData["partners_section_text"]) && $formData["partners_section_text"]!==null) echo $formData["partners_section_text"]; ?>
          </textarea>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputPassword1">Short Description</label>
          <textarea class="form-control" name="short_des">
            <?php if(isset($formData["short_des"]) && $formData["short_des"]!==null) echo $formData["short_des"]; ?>
          </textarea>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="description">Long description</label>
          <textarea class="form-control" name="description">
            <?php if(isset($formData["description"]) && $formData["description"]!==null) echo $formData["description"]; ?>
          </textarea>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="exampleInputPassword1">Owners</label>
          <input 
               type="text" 
               class="form-control" 
               name="meta_author" 
               placeholder="Owners" 
               value="<?php if(isset($formData["meta_author"]) && $formData["meta_author"]!==null) echo $formData["meta_author"]; ?>"
          >
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="description">Mete keywords</label>
          <textarea class="form-control" name="meta_keywords">
            <?php if(isset($formData["meta_keywords"]) && $formData["meta_keywords"]!==null) echo $formData["meta_keywords"]; ?>
          </textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="card-footer">
    <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</form>