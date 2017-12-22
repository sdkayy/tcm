<!-- Mass Delete Modal -->
<div class="modal fade" id="massDModal" tabindex="-1" role="dialog" aria-labelledby="delRec" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delRec">Delete Records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="records/massDelete">
        <div class="modal-body">
          {{ csrf_field() }}
          <div class="content">
              <div class="form-group">
                  <label>Field</label>
                  <select class="form-control" name="field">
                    <option value="user_added">Added By User</option>
                    <option value="gamertag">Gamertag</option>
                    <option value="ip">Same IP</option>
                    <option value="xuid">Same XUID</option>
                  </select>
              </div>
              <div class="form-group">
                  <label>Value to match</label>
                  <input placeholder="Enter Value" class="form-control" type="text" name="value">
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Remove all records</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Add Admin Modal -->
<div class="modal fade" id="addAdmin" tabindex="-1" role="dialog" aria-labelledby="addAdm" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAdm">Add a New Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="admins/add">
        <div class="modal-body">
          {{ csrf_field() }}
          <div class="content">
              <div class="form-group">
                  <label>Username</label>
                  <input placeholder="Enter Username" class="form-control" type="text" name="username">
              </div>
              <div class="form-group">
                  <label>Temp Password</label>
                  <input placeholder="Enter Password (Temp, they will be asked to changed)" class="form-control" type="password" name="password">
              </div>
              <div class="form-group">
                  <label>Confirm Temp Passwrord</label>
                  <input placeholder="Enter Password (Temp, they will be asked to changed)" class="form-control" type="password" name="password_confirmation">
              </div>
              <div class="form-group">
                  <label>Admin Level</label>
                  <select class="form-control" name="level">
                    <option value="-1">Level 1 (Noob)</option>
                    <option value="-2">Level 2 (Eh)</option>
                    <option value="-3">Level 3 (Super)</option>
                  </select>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Add Admin</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Add Whitelist Modal -->
<div class="modal fade" id="addWhitelist" tabindex="-1" role="dialog" aria-labelledby="addAdm" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAdm">Add a Whitelisted Field</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="whitelist/add">
        <div class="modal-body">
        {{ csrf_field() }}
          <div class="content">
            <div class="form-group">
              <label>Field</label>
              <select class="form-control" name="field">
                <option value="gamertag">Gamertag</option>
                <option value="ip">IP</option>
                <option value="xuid">XUID</option>
              </select>
            </div>
            <div class="form-group">
              <label>Value to match</label>
              <input placeholder="Enter Value" class="form-control" type="text" name="value">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Add Whitelist</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Public Search Modal -->
<div class="modal fade" id="searchRecords" tabindex="-1" role="dialog" aria-labelledby="addAdm" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAdm">Search Records</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="GET">
          <div class="modal-body">
            <div class="content">
                <div class="form-group">
                    <label>Field</label>
                    <select class="form-control" name="filter">
                      <option value="user_added">Added By User</option>
                      <option value="gamertag">Gamertag</option>
                      <option value="ip">Same IP</option>
                      <option value="xuid">Same XUID</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Value to match</label>
                    <input placeholder="Enter Value" class="form-control" type="text" name="value">
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-info">Search</button>
          </div>
      </form>
    </div>
  </div>
</div>