option cc_generic_services = true; // 生成RPC，这行必须加上
option java_generic_services = true; // 生成RPC，这行必须加上
package crawl;

message OneMP3
{
    required string title = 1;
    required string url = 2;
}

message GetMP3ListRequest{
    required string type=1; //标准英语还是慢速英语
};

message GetMP3ListResponse{
    repeated OneMP3 mp3s=1;
    required int32 status=2;
    required string msg=3;
};

service CrawlService {
    rpc GetMP3List(GetMP3ListRequest) returns (GetMP3ListResponse);
}