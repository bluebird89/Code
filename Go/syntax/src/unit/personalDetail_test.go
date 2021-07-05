package unit

import (
	"errors"
	"github.com/stretchr/testify/assert"
	"reflect"
	"testing"
)

func TestGetPersonDetail(t *testing.T) {
	type args struct {
		username string
	}
	tests := []struct {
		name    string
		args    args
		want    *PersonDetail
		wantErr bool
	}{
		{name: "invalid username", args: args{username: "steven xxx"}, want: nil, wantErr: true},
		{name: "invalid email", args: args{username: "invalid_email"}, want: nil, wantErr: true},
		{name: "throw err", args: args{username: "throw_err"}, want: nil, wantErr: true},
		{name: "valid return", args: args{username: "steven"}, want: &PersonDetail{Username: "steven", Email: "12345678@qq.com"}, wantErr: false},
	}

	// 为函数打桩序列
	// 使用 gomonkey 打函数桩序列
	// 第一个用例不会调用 getPersonDetailRedis，所以只需要 3 个值
	outputs := []gomonkey.OutputCell{
		{
			Values: gomonkey.Params{&PersonDetail{Username: "invalid_email", Email: "test.com"}, nil},
		},
		{
			Values: gomonkey.Params{nil, errors.New("request err")},
		},
		{
			Values: gomonkey.Params{&PersonDetail{Username: "steven", Email: "12345678@qq.com"}, nil},
		},
	}
	patches := gomonkey.ApplyFuncSeq(getPersonDetailRedis, outputs)
	// 执行完毕后释放桩序列
	defer patches.Reset()

	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			got, err := GetPersonDetail(tt.args.username)
			//if (err != nil) != tt.wantErr {
			//	t.Errorf("GetPersonDetail() error = %v, wantErr %v", err, tt.wantErr)
			//	return
			//}
			//if !reflect.DeepEqual(got, tt.want) {
			//	t.Errorf("GetPersonDetail() got = %v, want %v", got, tt.want)
			//}
			assert.Equal(t, tt.want, got)
			assert.Equal(t, tt.wantErr, err != nil)
		})
	}
}

func Test_checkEmail(t *testing.T) {
	type args struct {
		email string
	}
	tests := []struct {
		name string
		args args
		want bool
	}{
		{
			name: "email valid",
			args: args{
				email: "1234567@qq.com",
			},
			want: true,
		},
		{
			name: "email invalid",
			args: args{
				email: "test.com",
			},
			want: false,
		},
	}
	for _, tt := range tests {
		//t.Run(tt.name, func(t *testing.T) {
		//	if got := checkEmail(tt.args.email); got != tt.want {
		//		t.Errorf("checkEmail() = %v, want %v", got, tt.want)
		//	}
		//})
		got := checkEmail(tt.args.email)
		assert.Equal(t, tt.want, got)
	}
}

func Test_checkUsername(t *testing.T) {
	type args struct {
		username string
	}
	tests := []struct {
		name string
		args args
		want bool
	}{
		// TODO: Add test cases.
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			if got := checkUsername(tt.args.username); got != tt.want {
				t.Errorf("checkUsername() = %v, want %v", got, tt.want)
			}
		})
	}
}

func Test_getPersonDetailRedis(t *testing.T) {
	type args struct {
		username string
	}
	tests := []struct {
		name    string
		args    args
		want    *PersonDetail
		wantErr bool
	}{
		// TODO: Add test cases.
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			got, err := getPersonDetailRedis(tt.args.username)
			if (err != nil) != tt.wantErr {
				t.Errorf("getPersonDetailRedis() error = %v, wantErr %v", err, tt.wantErr)
				return
			}
			if !reflect.DeepEqual(got, tt.want) {
				t.Errorf("getPersonDetailRedis() got = %v, want %v", got, tt.want)
			}
		})
	}
}
