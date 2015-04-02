<!DOCTYPE HTML>
<body>
    <div class="subClassBox">
        <div class="tabbable tabs-left">
            <input type="hidden" id="nowReading_aid" value="" />
            <input type="hidden" id="nowReading_classify" value="" />
            <!-- Only required for left/right tabs -->
            <ul class="nav nav-tabs">
                <li class="active">
                    <a href="#official" data-toggle="tab" onclick="load_articles('official');">系所公告</a>
                </li>
                <li>
                    <a href="#advice" data-toggle="tab" onclick="load_articles('advice');">系務建議</a>
                </li>
                <li>
                    <a href="#credit_rule" data-toggle="tab" onclick="load_articles('credit_rule');">學務相關</a>
                </li>
            </ul>
            <div>
                <input type="button" class="btn btn-info btn-small" value="訂閱分類" onclick="subscribe('subscribe')"/>
                <input type="button" class="btn btn-primary btn-small" value="新增文章" onclick="display_writepad('new_article');"/>
            </div>
            <div class="forumArticleList">
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="official">
                        <table id="official_table" class="table table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <td> 主題 </td>
                                    <td> 作者 </td>
                                    <td> 時間 </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="advice">
                        <table id="advice_table" class="table table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <td> 主題 </td>
                                    <td> 作者 </td>
                                    <td> 時間 </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="credit_rule">
                        <table id="credit_rule_table" class="table table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <td> 主題 </td>
                                    <td> 作者 </td>
                                    <td> 時間 </td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="writepad">
        <div>
            <table>
                <tr>
                    <td>Topic : </td><td>
                    <input type="text" id="new_topic" style="width: 400px"/>
                    </td>
                </tr>
                <tr>
                    <td>Content : </td><td>                    <textarea id="new_content" style="resize: none; width: 400px; height: 300px;" onkeyup="this.value = this.value.slice(0, 1000)"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2">
                    <input type="button" class="btn btn-success" value="Send" style="float: right" onclick="write_article()" />
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div id="forumArticle">
        <div id="comment_area">
            <pre>
                <div class="page-header"><small>Leave message over here</small>
                    <textarea class="leave_message_box" id="leave_message_box"></textarea>
                    <input type="button" class="btn btn-success" value="Send" style="margin-left: 237px; margin-top: -40px;" onclick="comment_it()" />
                </div>
            </pre>
        </div>
        <input type="hidden" id="nowReading_aid" value="" />
        <p>
            Content
        </p>
        <pre><div id="forumArticleContent"></div></pre>
        <p>
            Comment
            <span style="float: right">
                <input type="button" class="btn btn-info btn-mini" value="New Comment" onclick="display_commentarea()" />
            </span>
        </p>
        <pre><div id="forumArticleComment"></div></pre>
    </div>
    <script>load_articles('forum_office'');
    </script>
</body>