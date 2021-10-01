<div class="d-flex vh-100">
    <div style="width: 600px; height: 550px; background-color: #1A1A1A; border-radius: 24px; padding:45px 50px 77px 50px;" class="mx-auto align-self-center">
          <?php echo $date; ?>
          <label style="color: aliceblue; font-size: 25px" >ผู้ติดเชื้อรายใหม่</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
              <input  name="infect" type="text" required class="form-control" id="infect" placeholder="infect"  minlength="2" style="width: 312px ; height: 40px;"  />
            
          </div>
</div>
          <div class="form-group">
          <label style="color: aliceblue; font-size: 25px">หายแล้ว</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-sm-5" align="center">
              <input  name="recovered" type="text" required class="form-control" id="recovered" placeholder="recovered"  minlength="2" style="width: 312px ; height: 40px;" />
            </div>
          </div>
          <div class="form-group">
          <label style="color: aliceblue; font-size: 25px">เสียชีวิต</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="col-sm-5" align="center">
              <input  name="death" type="text" required class="form-control" id="death"  style="width: 312px ; height: 40px;" />
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-3"> </div>
            <div class="col-sm-5" align="center" >
                
              <button type="submit" class="btn btn-success" id="btn"> <span class="glyphicon glyphicon-saved" ></span> บันทึกข้อมูล  </button>      
            </div> 
          </div>
        </form>