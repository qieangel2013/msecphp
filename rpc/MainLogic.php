option cc_generic_services = true; // 生成RPC，这行必须加上
option java_generic_services = true; // 生成RPC，这行必须加上
package MainLogic;

message GetTitlesRequest{
    required string type=1;
};

message GetTitlesResponse{
    repeated string titles=1;
    required int32 status = 2;
    required string msg = 3;
};

message GetUrlByTitleRequest{
    required string type=1;
    required string title = 2;
};

message GetUrlByTitleResponse{
    optional string url=1;
    required int32 status = 2;
    required string msg = 3;
};

message DownloadMP3Request
{
    required string type=1;
    required string title = 2;
}

message DownloadMP3Response
{
    required int32 status = 1;
    required string msg=2;
    optional int32 file_len=3;
    optional bytes file_content=4;
}

service MainLogicService{
    rpc GetTitles(GetTitlesRequest) returns (GetTitlesResponse);
    rpc GetUrlByTitle(GetUrlByTitleRequest) returns (GetUrlByTitleResponse);
    rpc DownloadMP3(DownloadMP3Request) returns (DownloadMP3Response);
}