                        <div class="htx-bid bd_s">
                            <h2>投标方案</h2>
                            <hr class="layui-bg-gray">
                            <form class="layui-form layui-form-pane mt20" >
<?php wp_nonce_field( 'htx_nonce_field_id', 'htx_nonce_field_name' ); ?>
<input type="hidden" name="bid_for_id" value="<?php the_ID(); ?>" /> 
<input type="hidden" name="bid_for_cat" value="<?php $idarr = wp_get_object_terms(get_the_ID(), 'assignmentstax', array('fields'=>'ids')); echo $idarr[0]; ?>" />
                                <div class="layui-form-item htx-from-item">
                                    <label class="layui-form-label">服务报价</label>
                                    <div class="layui-input-inline">
                                        <input id='v-condiction' type="text" name="bid_price" lay-verify="required|positiveInteger" placeholder="" class="layui-input fl ">
                                        <div class="layui-form-mid">元</div>
                                    </div>
                                    <label class="layui-form-label">工作周期</label>
                                    <div class="layui-input-inline">
                                        <input type="text" name="bid_work_period" lay-verify="required|positiveInteger" placeholder="" class="layui-input fl">
                                        <div class="layui-form-mid">天</div>
                                    </div>
                                </div>

                                <h3 class="layui-clear"> <span class="fl">服务说明</span></h3>
<script type="text/javascript" charset="utf-8" src="/bidueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/bidueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="/bidueditor/lang/zh-cn/zh-cn.js"></script>
                                <div class="layui-form-item layui-form-text">
                                    <div class="layui-input-block">
                                    <!--<textarea style="display:none;" id="bidueditor" name="bid_desc" lay-verify="required|nodisplay" placeholder="请说明服务内容" class="layui-textarea"></textarea>-->
                                    <div style="width:100%;"><script id="editor" type="text/plain" name="bid_desc" style="width:100%;height:220px;"></script></div>
                                    <p style="color:#898989;">备注：以上填写服务说明内容</p>
                                    </div>
                                </div>
<script type="text/javascript">
    var ue3 = UE.getEditor('editor');	//ue is an operable object		
</script>                                
                                <div class="layui-form-item mt20">
<button style="display:block; margin:0 auto; padding-left:40px; padding-right:40px; position:relative; top:-10px;" class="layui-btn layui-btn-danger" lay-submit="" lay-filter="formbidbutton">投 标</button>
                                </div> 
                            </form>
<input type="hidden" name="bid_cur_user_id" value="<?php echo $cur_user_id; ?>" /> 
<script type="text/javascript" src="/p/js/bid.js?ver=1.1"></script>
                        </div><!--.htx-bid bd_s-->  